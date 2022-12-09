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
    <link href="/home/css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="hero_area">
        @include('home.header')


        <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
            <div class="box shadow">
                <div class="img-box full">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="">
                </div>
                <div class="card-body">
                    <p>
                        {{ $product->title }}
                    </p>

                    @if ($product->discount_price != null)
                        {{-- <h6 style="color: red;">
                        Rp. {{ $product->discount_price }}
                    </h6> --}}
                        <h6>
                            Rp. {{ $product->price }} - {{ $product->discount_price }}
                        </h6>

                        <p class="badge bg-danger text-light">{{ $product->discount_price }} %</p> <span>

                            <h6 style="text-decoration: line-through;">
                                Rp. {{ $product->price }}
                            </h6>
                        @else
                            <h6>
                                Rp. {{ $product->price }}
                            </h6>
                    @endif
                    <h6>Product Category : {{ $product->category }} </h6>
                    {{-- <h6>Product Details : {!! $product->description !!} </h6> --}}
                    {{-- <h6>Product Quantity : {{ $product->quantity }} </h6> --}}
                    <form action="{{ url('add_cart', $product->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" name="quantity" id="" value="1" min="1"
                                    style="width: 100px">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="add to Cart">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        {{-- Coment --}}
        <div style="text-align: center">
            <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">
                Comments
            </h1>
            <form action="{{ url('add_comment') }}" method="post" class="mb-3">
                @csrf
                <input type="text" name="productid" value="{{ $product->id }}" hidden>
                <textarea name="comment" id="" placeholder="Comment something here" style="width: 250px; height: 50px"></textarea>
                <input type="submit" class="btn btn-success" value="Comment">
            </form>

        </div>

        <hr>
        <div class="container">
            <div class="m-5">
                <h1>All Comment</h1>

                @foreach ($comment as $comment)
                    @if ($comment->product_id == $product->id)
                        <div class="mt-3 mb-2">
                            <b>{{ $comment->name }}</b> {{ $comment->comment }}
                            <br>

                            <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}"
                                style="color: black; font-size: 12px">Balas</a>

                            <a onclick="return confirm('are you sure')"
                                href="{{ url('delete_comment', $comment->id) }}"
                                style="color: black; font-size: 12px">Hapus</a>


                            @foreach ($reply as $rep)
                                @if ($rep->comment_id == $comment->id)
                                    <div style="padding-left: 5%; padding-bottom: 10px; padding-top: 10px">
                                        <b>{{ $rep->name }}</b> {{ $rep->reply }}
                                        <br>
                                        <a href="javascript::void(0);" onclick="reply(this)"
                                            data-Commentid="{{ $comment->id }}"
                                            style="color: black; font-size: 12px">Balas</a>
                                        <a onclick="return confirm('are you sure')"
                                            href="{{ url('delete_reply', $rep->id) }}"
                                            style="color: black; font-size: 12px">Hapus</a>
                                    </div>
                                @endif
                            @endforeach



                        </div>
                        <hr>
                    @endif
                @endforeach



                <div style="display: none;" class="replyDiv">
                    <form action="{{ url('add_reply') }}" method="post">
                        @csrf
                        <input type="text" id="commentId" name="commentId" hidden="">

                        <textarea placeholder="write something here" style="height: 100px; width: 250px" name="reply"></textarea><br>

                        <button type="submit" class="btn btn-warning">reply</button>

                        <a href="javascript::void(0);" onclick="reply_close(this)" class="btn btn-red">Close</a>
                    </form>
                </div>
            </div>
        </div>


        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                {{-- Distributed By <a href="https://themewagon.com/" target="_blank">Sukron anugrah</a> --}}

            </p>
        </div>

        <script type="text/javascript">
            function reply(caller) {

                $('.replyDiv').insertAfter($(caller));
                $('.replyDiv').show();
                document.getElementById('commentId').value = $(caller).attr('data-Commentid');
            }

            function reply_close(caller) {
                $('.replyDiv').hide();
            }
        </script>


        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var scrollpos = localStorage.getItem('scrollpos');
                if (scrollpos) window.scrollTo(0, scrollpos);
            });

            window.onbeforeunload = function(e) {
                localStorage.setItem('scrollpos', window.scrollY);
            };
        </script>
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
