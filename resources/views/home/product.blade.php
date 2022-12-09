<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>

        {{-- <form action="{{ url('product_search') }}" method="get">
            @csrf
            <input type="text" name="search" placeholder="Search for something">
            <input type="submit" value="Search">
        </form> --}}

        <div class="row">
            @foreach ($product as $product)
                <div class="col-md-3">
                    <div class="box shadow">
                        <div class="option_container">
                            <div class="options">
                                <a href="/product_details/{{ $product->id }}" class="option1">
                                    Detail
                                </a>
                                <form action="{{ url('add_cart', $product->id) }}" method="post">
                                    @csrf
                                    <input type="number" name="quantity" id="" value="1" min="1"
                                        style="width: 100px" hidden="">
                                    <input type="submit" value="add to Cart" value="1" class="">
                                </form>
                            </div>
                        </div>
                        <div class="img-box full">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="">
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->title }}
                            </p>


                            @if ($total = ($product->discount_price / 100) * $product->price)
                                @if ($setelah_disc = $product->price - $total)
                                    <h6>
                                        Rp {{ $setelah_disc }}00
                                    </h6>

                                    <span class="badge bg-danger text-light">{{ $product->discount_price }} %</span>

                                    <span style="text-decoration: line-through;">
                                        Rp {{ $product->price }}
                                    </span>
                                @endif
                            @else
                                <h6>
                                    Rp {{ $product->price }}
                                </h6>
                            @endif

                            {{-- @if ($product->discount_price != null)
        
                                <p class="badge bg-danger text-light">{{ $product->discount_price }} %</p> <span>

                                    <h6 style="text-decoration: line-through;">
                                        Rp. {{ $product->price }}
                                    </h6>
                                @else
                                    <h6>
                                        Rp. {{ $product->price }}
                                    </h6>
                            @endif --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div> --}}
    </div>
</section>
