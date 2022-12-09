@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1>{{ auth()->user()->name }}</h1>
        </div>
    </div>
</div>

@endsection