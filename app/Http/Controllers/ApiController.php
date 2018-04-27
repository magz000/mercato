<?php

namespace App\Http\Controllers;

use App\Model\Location;
use App\Model\Product;
use App\model\ProductCategory;
use App\Model\Provider;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function splash(){
        $data = array(
            "categories" => ProductCategory::all(),
            "locations" => Location::all()
        );

        return response()->json($data);
    }

    public function search(Request $request){
        $results = null;

        $date_time = strtotime($request->date . ' ' . $request->time);

        if (time() > $date_time) {
            $results = null;
        } else {

            if ($request->type == 1) {
                $results = Product::result_category($request->category,
                    $request->date,
                    $request->location,
                    $request->sort,
                    $request->amount_from,
                    $request->amount_to);
            } else if ($request->type == 2) {
                $results = Product::result_food($request->product_name,
                    $request->date,
                    $request->location,
                    $request->sort);
            }

            $results->load('category');
        }

        $data = array(
            "results" => $results
        );

        return response()->json($results);
    }
}
