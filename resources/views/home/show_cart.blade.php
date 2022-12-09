<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
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
    <title>Sayur Shop - Belanja Sayran Masa Kini</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="/home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="/home/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <div class="hero_area">
        @include('home.header')

        <div class="container m-5">
            <div class="row ">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <button class="close" type="button" data-dismis="alert" aria-hidden="true">x</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if ($cart->count())
                <div class="card-body m-5">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>Product Title</th>
                                <th>Product Quantity</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalprice = 0; ?>
                            @foreach ($cart as $cart)
                                <tr>
                                    <td>{{ $cart->product_title }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td><img src="{{ asset('storage/' . $cart->image) }}" alt="" width="10%">
                                    </td>
                                    <td>Rp. {{ $cart->price }}</td>
                                    <td><a onclick="return confirm('are you sure')"
                                            href="{{ url('remove_cart', $cart->id) }}"
                                            class="btn btn-danger btn-sm">Remove</a></td>
                                </tr>
                                <?php $totalprice = $totalprice + $cart->price; ?>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td colspan="3">
                                <h3>Total Price :</h3>
                            </td>
                            <td>
                                Rp. {{ $totalprice }}
                            </td>
                           
                            <tr>
                                <td colspan="3" >
                                    Pembayaran
                                </td>
                                <td >
                                    <a href="{{ url('cash_order') }}" class="btn btn-danger btn-sm">Cod</a>
                                </td>
                                <td>
                                    <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger btn-sm">Pay card</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @else
                <div class="row m-5 justify-center"
                    style="background-image: url(/shop.png); background-repeat: no-repeat">
                    <div class="col-md-6">
                        <img src="/shop.png" width="30%">
                        <a href="/" class="btn btn-primary">Ayoo mulai belanja</a>
                    </div>
                </div>
            @endif

        </div>


        <div class="container m-5">
            <div class="row justify-center">
                @foreach ($product as $product)
                    <div class="col-md-2">
                        <a href="/product_details/{{ $product->id }}">
                            <div class="card shadow">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <p class="card-text">
                                        @if ($total = ($product->discount_price / 100) * $product->price)
                                            @if ($setelah_disc = $product->price - $total)
                                                <h6>
                                                    Rp {{ $setelah_disc }}
                                                </h6>

                                                <span class="badge bg-danger text-light">{{ $product->discount_price }}
                                                    %</span>

                                                <span style="text-decoration: line-through;">
                                                    Rp {{ $product->price }}
                                                </span>
                                            @endif
                                        @else
                                            <h6>
                                                Rp {{ $product->price }}
                                            </h6>
                                        @endif
                                    </p>
                                    <form action="{{ url('add_cart', $product->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <input type="number" name="quantity" id="" value="1"
                                                min="1" hidden>
                                            {{-- <input type="submit" value="add" class="btn btn-primary"> --}}
                                            <button type="submit" class="btn btn-success text-success">submit</button>
                                        </div>
                                    </form>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

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
