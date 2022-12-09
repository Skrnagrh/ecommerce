@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col my-3">
                    <a href="/admin/product" class="btn btn-danger"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="card shadow">
                        <img src="{{ asset('storage/' . $product->image) }}" style="max-height: 100%" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text"><strong>Rp. {{ $product->price }}</strong></p>
                            <p class="card-text badge bg-pink"><strong>{{ $product->discount_price }} %</strong></p> <span>
                                class="text-gray"><strike>Rp. {{ $product->price }}</strike></span>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
