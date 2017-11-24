<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// Imports Models
use App\Model\PageView;
use App\Model\AuditTrail;
use App\Model\ProductCategory;
use App\Model\Product;
use App\Model\Provider;
use App\Model\Cart;
use App\Model\Order;
use App\Model\OrderContent;
use App\Model\OrderTransaction;
use App\Model\Location;
use App\Model\User;


use App\Services\SMS;
use App\Services\Emailer;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class GeneralController extends Controller
{

    public function __construct() {
        //PageView::insert();

        $this->_api_context = new ApiContext(new OAuthTokenCredential(
          config('services.paypal.client_id'),
          config('services.paypal.secret')));

         $this->_api_context->setConfig(array(
          'mode' => 'sandbox',
          'service.EndPoint' => 'https://api.sandbox.paypal.com',
          'http.ConnectionTimeOut' => 120,
          'log.LogEnabled' => true,
          'log.FileName' => storage_path('logs/paypal.log'),
          'log.LogLevel' => 'FINE'
      ));

    }

    // TODO : Displays the Landing Page
    public function index() {
        $data = array(
            "MainCategories"    => ProductCategory::get_main(),
            "SubCategories"     => function($parent) {
                    return ProductCategory::get_sub($parent);
                },
            "Locations"  => Location::all()
        );

        return view('public.landing')->with($data);
    }

    public function search(Request $request) {

        $results = null;

        if($request->type == 1) {
            $results = Product::result_category($request->category, $request->date, $request->location);
        } else if($request->type == 2) {
            $results = Product::result_food($request->product_name, $request->date, $request->location);
        }

        $data = array(
            "MainCategories"    => ProductCategory::get_main(),
            "SubCategories"     => function($parent) {
                    return ProductCategory::get_sub($parent);
                },
            "Provider"          => function($provider_id) {
                    return Provider::find($provider_id);
                },
            "input"            => $request,
            "results"            => $results,
            "Locations"  => Location::all()
        );
        return view('public.search')->with($data);
    }

    public function user_page(Request $request, $username) {

        $Provider =  Provider::where('username', '=', $username)->get()->first();
        $data = array(
            "MainCategories"    => ProductCategory::get_main(),
            "SubCategories"     => function($parent) {
                    return ProductCategory::get_sub($parent);
                },
            "Provider"          => $Provider,
            "Products"          => Product::where('provider_id', '=', $Provider->id)->get(),
        );


        return view('public.profile')->with($data);
    }

    public function checkout() {
        return view('public.checkout');
    }

    public function payment($oid, $uid, $enc) {

        if(md5($oid . ' ' . $uid) != $enc) {
            return redirect(route('landingPage'));
        }

        $data = array(
            "order" => Order::find($oid),
            "oid"   => $oid,
            "uid"   => $uid,
            "enc"   => $enc
        );

        return view('public.payment')->with($data);
    }

    public function payment_cancelled($oid, $uid, $enc) {
        if(md5($oid . ' ' . $uid) != $enc) {
            AuditTrail::log('orders', 'Cancelled the Order id ' . $oid);
            return redirect(route('landingPage'));
        }
    }

    public function payment_success($oid, $uid, $enc, Request $request) {

        if(md5($oid . ' ' . $uid) != $enc) {
            return redirect(route('landingPage'));
        }

        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = Payment::get($id, $this->_api_context);

        $paymentExecution = new PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_api_context);

        $order = Order::find($oid);

        $transaction = new OrderTransaction;
        $transaction->order_id = $oid;
        $transaction->payment_id = $id;
        $transaction->payer_id = $payer_id;
        $transaction->method = 'paypal';
        $transaction->status =  $executePayment->getState();
        $transaction->save();

        $order->status = 2;
        $order->save();


        $user = User::find($order->user_id);

        $mail_data = array(
            "fullname"  => $user->firstname . ' ' . $user->lastname,
            "date"      => date('m d Y', strtotime($order->create_at)),
            "order_id"  => $order->id,
            "control_no"=> Order::format($order->id)
        );

        $email = new Emailer('carlo.flores@chefsandbutlers.net', 'email.receipt', $mail_data, 'Receipt');
        $email->send();


        AuditTrail::log('orders', 'Paid the Order ' . $oid);
        return redirect(route('paymentSuccessMessagePage', $oid));
    }

    public function payment_success_message($oid) {
        return view('public.success')->with(array(
            "oid"   => $oid
        ));
    }

    // TODO: POST Methods
    public function add_cart(Request $request) {
        $this->validate($request, [
            "prid" => 'required',
            "crdate" => 'required',
            "crtime" => 'required',
            "loca" => 'required'
        ]);

        $status = Cart::add_cart(Auth::guard('u')->user()->id, $request->prid, $request->crdate, $request->crtime, $request->loca);
        AuditTrail::log('carts', $status . 'Added to Cart product id = ' . $request->prid);

        return redirect(url()->previous())->with('success', 'Successfully added to Cart.');
    }

    public function delete_cart(Request $request) {
        $this->validate($request, [
            "cart_id" => 'required'
        ]);

        $cart = Cart::find($request->cart_id);
        AuditTrail::log('carts',' Deleted a Cart product id = ' . $cart->product_id);
        $cart->delete();

        return redirect(url()->previous())->with('success', 'Successfully Deleted a product from Cart.');
    }

    public function checkout_process(Request $request) {
        $this->validate($request, [
            "firstname"     => 'required',
            "lastname"      => 'required',
            "street"        => 'required',
            "barangay"      => 'required',
            "city"          => 'required',
            "state"         => 'required',
            "contact"       => 'required'
        ]);

        $carts = Cart::where('user_id', '=', Auth::guard('u')->user()->id)->get();
        $grandtotal=$fees=0;

        // TODO : Grandtotal and Fees computation
        foreach ($carts as $key => $cart) {
            $fees += 20;
            $grandtotal += $cart->total;
        }

        // TODO : Inserting a new Order
        $order = new Order;
        $order->user_id         = Auth::guard('u')->user()->id;
        $order->total           = $grandtotal;
        $order->service_charge  = $fees;
        $order->tax             = 0;
        $order->firstname       = $request->firstname;
        $order->middlename      = $request->middlename;
        $order->lastname        = $request->lastname;
        $order->street          = $request->street;
        $order->barangay        = $request->barangay;
        $order->city            = $request->city;
        $order->state           = $request->state;
        $order->contact         = $request->contact;
        $order->save();

        AuditTrail::log('orders', 'Checkout of Order id ' . $order->id);

        // TODO : Transfering of Cart to Order Table
        foreach ($carts as $key => $cart) {
            $product    = Product::find($cart->product_id);
            $provider   = Provider::find($product->provider_id);


            $content = new OrderContent;
            $content->order_id = $order->id;
            $content->product_id = $cart->product_id;
            $content->provider_id = $provider->id;
            $content->quantity = $cart->quantity;
            $content->price = $product->price;
            $content->total = $cart->total;
            $content->pickup_location = $cart->pickup_location;
            $content->pickup_date = $cart->pickup_date;
            $content->pickup_time = $cart->pickup_time;
            $content->note = $request->input('note_product_' . $cart->id);
            $content->progress = 0;
            $content->status = 0;
            $content->save();

            Cart::find($cart->id)->delete();
        }


        return redirect(route('paymentPage', [$order->id, $order->user_id, md5($order->id . ' ' . $order->user_id)]));
    }

    public function payment_process($oid, $uid, $enc) {

        if(md5($oid . ' ' . $uid) != $enc) {
            return redirect(route('landingPage'));
        }

        $order = Order::find($oid);
        $contents = OrderContent::where('order_id', '=', $order->id)->get();

        $payer = new Payer();
	    $payer->setPaymentMethod('paypal');
        $itemListArr = array();
        $grandtotal=$fees=0;

        foreach ($contents as $key => $content) {

            $product = Product::find($content->product_id);
            $provider = Provider::find($product->provider_id);

            $grandtotal += $content->total;
            $fees += 20;


            $item = new Item();
            $item->setName($product->name)
                ->setCurrency('PHP')
                ->setQuantity($content->quantity)
                ->setSku($product->id)
                ->setPrice($content->price)
                ->setDescription($product->name . ' Served By : ' . $provider->firstname .  ' ' . $provider->lastname);

            $itemListArr[] = $item;

        }

        $item = new Item();
        $item->setName("Admin Fee")
            ->setCurrency('PHP')
            ->setQuantity(1)
            ->setSku('f1234')
            ->setPrice($fees)
            ->setDescription('Admin Fee');

        $itemListArr[] = $item;

        $itemList = new ItemList();
        $itemList->setItems($itemListArr);



	    $amount = new Amount();
	    $amount->setCurrency('PHP');
	    $amount->setTotal($grandtotal+$fees);


	    $transaction = new Transaction();
	    $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription('Team / individual');

	    $redirectUrls = new RedirectUrls();
	    $redirectUrls->setReturnUrl(route('paymentSuccessPage', [$oid, $uid, $enc]));
	    $redirectUrls->setCancelUrl(route('paymentCancelledPage', [$oid, $uid, $enc]));

	    $payment = new Payment();
	    $payment->setIntent('sale');
	    $payment->setPayer($payer);
	    $payment->setRedirectUrls($redirectUrls);
	    $payment->setTransactions(array($transaction));

	    $response = $payment->create($this->_api_context);
	    $redirectUrl = $response->links[1]->href;

	    return redirect()->to( $redirectUrl );

    }

    public function catcher() {
        return redirect(route('landingPage'));
    }

    // Below are the API for the Resources
    public function resources_product($id) {
        header('Content-Type: image/jpeg');
        $product = Product::find($id);
        echo $product->picture;
    }

    public function resources_provider($id) {
        header('Content-Type: image/jpeg');
        $provider = Provider::find($id);
        echo $provider->picture;
    }
}
