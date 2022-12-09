<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    .header_section{
        background-color: #395144;
    }
    .slider_section{
        margin-top: -20%;
    }
</style>
<body>
    <div class="hero_area">
        @include('home.header')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#395144" fill-opacity="1" d="M0,160L120,186.7C240,213,480,267,720,256C960,245,1200,171,1320,133.3L1440,96L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>
        @include('home.slider')
    </div>
    <!-- why section -->
    {{-- @include('home.why') --}}
    {{-- @include('home.new_arival') --}}
    @include('home.product')

    {{-- <div style="text-align: center">
        <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">
            Comments
        </h1>
        <form action="{{ url('add_comment') }}" method="post" class="mb-3">
            @csrf
            <input type="text" name="productid">
            <textarea name="comment" id="" cols="30" rows="10" placeholder="Comment something here"
                style="height: 100px; width: 250px"></textarea>
            <br>
            <input type="submit" class="btn btn-success" value="Comment">
        </form>
    </div>

    <hr>
    <div class="container">
        <div class="m-5">
            <h1>All Comment</h1>

            @foreach ($comment as $comment)
                <div>
                    <b>{{ $comment->name }}</b> {{ $comment->comment }}
                    <br>

                    <a href="javascript::void(0);" onclick="reply(this)"
                        data-Commentid="{{ $comment->id }}"><span>Reply</span></a>

                    @foreach ($reply as $rep)
                        @if ($rep->comment_id == $comment->id)
                            <div style="padding-left: 5%; padding-bottom: 10px; padding-top: 10px">
                                <b>{{ $rep->name }}</b> {{ $rep->reply }}
                                <br>
                                <a href="javascript::void(0);" onclick="reply(this)"
                                    data-Commentid="{{ $comment->id }}"><span>Reply</span></a>
                            </div>
                        @endif
                    @endforeach

                </div>
                <hr>
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
    </div> --}}



    {{-- @include('home.subscribe')
      @include('home.client')
      @include('home.footer') --}}


    <!-- footer end -->
    {{-- <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
         </p>
      </div> --}}
    <script type="text/javascript">
        function reply(caller) {
           
           $('.replyDiv').insertAfter($(caller));
           $('.replyDiv').show();
           document.getElementById('commentId').value=$(caller).attr('data-Commentid');
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
