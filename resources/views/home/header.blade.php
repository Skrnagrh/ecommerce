<header class="header_section fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="/"><img width="250" src="" alt="Sayur Shop" /></a>
            <div class="col-sm-3 col-md-8 btn">
                <form action="{{ url('product_search') }}" method="get" class="form-inline">
                    @csrf
    
                    <div class="input-group input-group-sm col-sm-12">
                        <input type="text" class="form-control" placeholder="Cari Sayuran di Sayur Shop aja"
                            aria-describedby="basic-addon2" name="search">
                        <button class="badge text-grey" type="submit" id="basic-addon2">
                            <i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <a class="btn {{ Request::is('show_cart') ? 'active' : '' }} " href="{{ url('show_cart') }}"><i
                class="bi bi-bag-fill"></i></a>
            <a class="btn {{ Request::is('show_orderer') ? 'active' : '' }} " href="{{ url('show_order') }}"><i
                class="bi bi-bell-fill"></i></a>
                @if (Route::has('login'))
                @auth
                    <x-app-layout>

                    </x-app-layout>
                @else
                        <a class="btn btn-outline-light mx-1" href="{{ route('login') }}">Login</a>

                        <a class="btn btn-success mx-1" href="{{ route('register') }}">Register</a>
                @endauth
            @endif
          

            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""></span>
            </button> --}}


            {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li> 
                    
                    <form class="form-inline">
                        <button class="btn my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('show_cart') ? 'active' : '' }}"
                            href="{{ url('show_cart') }}"><i class="bi bi-bag-fill"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('show_orderer') ? 'active' : '' }}"
                            href="{{ url('show_order') }}"><i class="bi bi-bell-fill"></i></a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <x-app-layout>

                            </x-app-layout>
                        @else
                            <li class="nav-item mx-2">
                                <a class="btn btn-outline-light" href="{{ route('login') }}">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif

                </ul>
            </div> --}}
        </nav>
    </div>
</header>
