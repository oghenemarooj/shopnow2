<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryProduct;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('admin.add_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'tags' => 'required',
            'image' => 'required',
        ]);


        $file = $request->image;
        $extension = $file->getClientOriginalExtension();
        $file_name = $request->name.time(). '.' . $extension;
        Storage::put('public/products/' . $file_name, fopen($file, 'r+'));

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->tags = $request->tags;
        $product->image = $file_name;
        $product->slug = \Str::slug($request->name);
        $product->save();


        foreach ($request->categories as $category) {
            $cp = new CategoryProduct();
            $cp->product_id = $product->id;
            $cp->category_id = $category;
            $cp->save();
        }

        foreach ($request->images as $file) {
            $extension = $file->getClientOriginalExtension();
            $filenametostore = time().uniqid().'.' . $extension;
            Storage::put('public/products/' . $filenametostore, fopen($file, 'r+'));
            //Resize image here
            $thumbnailpath = 'storage/products/' . $filenametostore;
            $img = Image::make($thumbnailpath)->resize(685, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            /* add image to database */
            $prod_image = new ProductImage();
            $prod_image->product_id = $product->id;
            $prod_image->name = $filenametostore;
            $prod_image->save();
        }

        return back()->with(['success' => 'Product uploaded']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
