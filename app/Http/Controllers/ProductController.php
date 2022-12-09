<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
// use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index',[
            'products' => Product::paginate(2)->withQueryString(),
            // 'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',[
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required|max:255',
            'quantity' => 'required|max:255',
            'price' => 'required|max:255',
            'discount_price' => 'required|max:255',
            'image' => 'image|file|max:10024',
        ]);
        
        if ($request->total)
        {
            $setelah_disc = ($request->discount_price / 100) * $request->price;
            $validatedData = $setelah_disc;
        }
        // buat menyimpan file gambar
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('product-images');
        }
        Product::create($validatedData);
        // untuk menampilkan alert atau kata sukses 
        return redirect('/admin/product')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image){
            Storage::delete($product->image);
        }
        // buat deleted data 
        Product::destroy($product->id);
        // alert sukses delete
        return redirect('/admin/product')->with('success', 'New post has been deleted!');
    }

    // public function checkSlug(Request $request)
    // {
    //     $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
    //     return response()->json(['slug' => $slug]);
    // }
}
