@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="continer">
            <div class="row justify-content-center">
                <div class="col">
                    <h1 style="text-align: center" class="mt-5">Send Email To {{ $order->email }}</h1>

                    <form action="{{ url('send_user_email', $order->id) }}" method="post">
                        @csrf

                        <div style="padding-left: 35%; padding-top: 30px">
                            <label for="greeting">Email Greating</label>
                            <input type="text" name="greeting">
                        </div>
                        
                        <div style="padding-left: 35%; padding-top: 30px">
                            <label for="Firstline">Email Firstline</label>
                            <input type="text" name="firstline">
                        </div>
                        
                        <div style="padding-left: 35%; padding-top: 30px">
                            <label for="body">Email body</label>
                            <input type="text" name="body">
                        </div>
                        
                        <div style="padding-left: 35%; padding-top: 30px">
                            <label for="button">Email Button Name</label>
                            <input type="text" name="button">
                        </div>
                        
                        <div style="padding-left: 35%; padding-top: 30px">
                            <label for="url">Email Url</label>
                            <input type="text" name="url">
                        </div>
                        
                        <div style="padding-left: 35%; padding-top: 30px">
                            <label for="lastline">Email lastline</label>
                            <input type="text" name="lastline">
                        </div>

                        <div style="padding-left: 35%; padding-top: 30px">
                            <input type="submit" value="Send Email" class="btn btn-success">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
