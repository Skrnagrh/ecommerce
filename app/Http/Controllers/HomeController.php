<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Stripe;
use PDF;
use Notification;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $product = Product::all();
        $comment = Comment::orderby('id', 'desc')->get();
        $reply = Reply::all();
        return view('home.userpage', compact('product', 'comment', 'reply'));
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;
        
        if($usertype=='1')
        {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user =User::all()->count();

            $order = Order::all();
            $total_revenue = 0;
            foreach($order as $order)
            {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delivery_status', '=', 'Delivered')->get()->count();
            $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();
            

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        }else{
            // $product = Product::paginate(10);
            $product = Product::all();
            $comment = Comment::orderby('id', 'desc')->get();
            $reply = Reply::all();
            return view('home.userpage', compact('product', 'comment', 'reply'));
        }
    }

    public function product_details($id)
    {

        $product = Product::find($id);
        $comment = Comment::orderby('id', 'desc')->get();
        $reply = Reply::all();

        return view('home.product_details', compact('product', 'comment', 'reply'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            // if($product->discount_price !=null)
            // {
            //     $cart->price = $product->discount_price * $request->quantity;
            // }
            // else{
            //     $cart->price = $product->price * $request->quantity;
            // }
            if($product->discount_price !=null)
            {
                if($total_disc = ($product->discount_price / 100) * $product->price);
                if($total = $product->price - $total_disc);

                $cart->price =  $total * $request->quantity;
            }
            else{
                $cart->price = $product->price * $request->quantity;
            }

            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart-> save();
            return redirect()->back();
            
        }
        else 
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            $product = Product::all();
            return view('home.show_cart', compact('cart', 'product'));
        }
        else{
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart =  Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user =  Auth::user();
        $userid = $user->id;
        
        $data = Cart::where('user_id', '=', $userid)->get();
        foreach($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'We have Received You Order. we will connect with you soon');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test for payment." 
        ]);

        $user =  Auth::user();
        $userid = $user->id;
        
        $data = Cart::where('user_id', '=', $userid)->get();
        foreach($data as $data)
        {
            $order = new Order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Paid in the card';
            $order->delivery_status = 'processing';

            $order->save();
            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }
      
        // Session::flash('success', 'Payment successful!');
              

        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            $product = Product::all();
            return view('home.show_cart', compact('cart', 'product'));
        }

        // return redirect()->back()->with('success', 'Payment successful!');
    }

    public function print_pdf($id)
    {
        $order = Order::find($id);

        $pdf = PDF::loadView('admin.order.pdf', compact('order'));
        
        return $pdf->download('order_details.pdf');
    }


    public function send_email($id)
    {
        $order = Order::find($id);

        return view('admin.order.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back();
    }

    public function searchdata(Request $request)
    {
        $searchText = $request->search;
        $order = Order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->get();

        return view('admin.order.index', compact('order'));
    }

    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $order = Order::orWhere('user_id', '=', $userid)->get(); 
            return view('home.order', compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order =  Order::find($id);
        $order->delivery_status = 'You Cancel the Order';

        $order->save();
        return redirect()->back();
    }

    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment = new Comment;
            // $product = Product::all();

            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->product_id = $request->productid;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect()->back();

        }
        else{
            return redirect('login');
        }
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply = new Reply;
            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->save();
            return redirect()->back();
            
        }else{
            return redirect('login');
        }
    }

    public function product_search(Request $request)
    {
        $comment = Comment::orderby('id', 'desc')->get();
        $reply = Reply::all();

        $search_text = $request->search;
        $product = Product::where('title', 'LIKE', "%$search_text%")->orWhere('category', 'LIKE', "%$search_text%")->get();
        
        return view('home.userpage', compact('product', 'comment', 'reply'));
    }

    public function delete_comment($id)
    {
        $comment =  Comment::find($id);
        $comment->delete();
        return redirect()->back(); 
    }

    public function delete_reply($id)
    {
        $reply =  Reply::find($id);
        $reply->delete();
        return redirect()->back(); 
    }

}
