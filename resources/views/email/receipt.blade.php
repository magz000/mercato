<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">

    <style media="screen">
        body {
            background: #fff;
        }
    </style>
  </head>
  <body>

      @inject('OrderContent', 'App\Model\OrderContent')
      @inject('Order',        'App\Model\Order')
      @inject('Product',      'App\Model\Product')
      @inject('Provider',      'App\Model\Provider')
      @inject('OrderRating',      'App\Model\OrderRating')
      @inject('Encrypt',      'App\Services\Encryption')

      <br/><br/>
      <div class="col-md-8 col-md-offset-2">
          <center>
              <h1>Virtual Mercato</h1>
          </center>
          <h3 style="margin-bottom: -3px;">
              Hello, Carlo Flores
          </h3>
          <p>This mail informs you that the payment is received and your order is in process. </p>

          <hr>
            <small class="pull-left">Order #</small><h1 class="pull-left" style="margin: 0px;">1000241117-0004</h1>
            <h4 class="pull-right" style="margin-top: 10px;">Nov 11, 2017</h4>
            <div class="clearfix"></div>
          <hr>
          <table class="table small">
              <thead  style="border-bottom: 1px solid #ddd;">
                  <th></th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Pickup Date & Time</th>
                  <th>Pikcup Location</th>
                  <th>Status</th>
                  <th>Note</th>
              </thead>
              <tbody>
                  @php
                      $items = "";
                  @endphp
                  @foreach ($OrderContent->where('order_id', '=', 4)->get() as $content)
                      {{ $OrderContent->expire($content) ? '' : '' }}
                      @php
                        $items .= $content->id.','.$content->quantity . ','. $content->price . '|';
                      @endphp
                      <tr>
                          <td><div class="avatar med" style="background-image: url('{{ asset('img/uploads/' . $Product->find($content->product_id)->picture) }}')"></div></td>
                          <td>
                              {{ $Product->find($content->product_id)->name }}<br/>
                              Served By : <a href="{{ route('userPage', $Provider->find($content->provider_id)->username) }}">{{ $Provider->find($content->provider_id)->firstname . ' ' . $Provider->find($content->provider_id)->lastname }}</a>
                          </td>
                          <td>{{ $content->quantity }}</td>
                          <td>PHP {{ number_format($content->price, 2) }}</td>
                          <td>PHP {{ number_format($content->total, 2) }}</td>
                          <td>{{ date('M d, Y', strtotime($content->pickup_date)) . ' ' . $content->pickup_time }}</td>
                          <td>{{ $content->pickup_location }}</td>
                          <td><span class="label label-{{ $OrderContent->state($content->status)['state'] }}">{{ $OrderContent->state($content->status)['value'] }}</span></td>
                          <td>{{ $content->note }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>

          <div class="row">
              <div class="col-md-6">
                  <div class="pull-left">
                      {!! QrCode::size(150)->generate($Encrypt->encrypt('1000241117-0004')) !!}
                  </div>
                  <div class="pull-left">
                      {!! QrCode::size(150)->generate($Encrypt->encrypt($items)) !!}
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="pull-right" style="text-align: right;">
                      <small>PHP</small>
                      <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Order Total </small> {{ number_format($Order->find(4)->total, 2) }}</h3>
                      <small>PHP</small>
                      <h3 style="margin-top: -5px;"><small style="font-size: 12px;">Service Charge </small> {{ number_format($Order->find(4)->service_charge, 2) }}</h3>
                      <small>PHP</small>
                      <h1 style="margin-top: -5px;"><small style="font-size: 12px;">Grand Total </small> {{ number_format($Order->find(4)->total + $Order->find(4)->service_charge, 2) }}</h1>
                  </div>
              </div>
          </div>
      </div>
  </body>

</html>
