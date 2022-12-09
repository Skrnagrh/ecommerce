<!DOCTYPE html>
<html>
    <head>
        <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="/shop.png" type="">
      <title>Sayur Shop - Belanja Sayuran Masa Kini</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="/home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="/home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="/home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      <link href="/home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
      
      
      <div class="card mt-5">
        <div class="col-md-6" style="margin: auto; width: 50%; padding: 30px">
            <table class="table table-border table-sm">
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($order as $order)
                <tr>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td><img src="{{ asset('storage/' . $order->image) }}" alt=""></td>
                    <td>
                        @if ($order->delivery_status == 'processing')
                        <a href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger"  onclick="return confirm('Are You Sure to Cancel The Order???')">Cancel Order</a></td>     
                        @else
                            <p style="color: blue">Pesanan Sedang Diantar</p>
                        @endif
                        
                </tr>
                @endforeach
            </table>
          </div>
      </div>
    </div>
 
      
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            {{-- Distributed By <a href="https://themewagon.com/" target="_blank">Sukron anugrah</a> --}}
         
         </p>
      </div>
      <!-- jQery -->
      <script src="/home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="/home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="/home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="/home/js/custom.js"></script>
   </body>
</html>