<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all()->sortBy('name');

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);
        return view('products.create')
            ->with('categories', Category::all()->sortBy('name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Product::class);
        // create validation
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|max:2000'
        ]);

        // save the image after validation
        $path = $request->file('image')->store('public/products');

        // this will return the url of the saved image
        $url = Storage::url($path);

        // Create new product entry
        $product = new Product($validatedData);

        // assign the value of the product image
        $product->image = $url;

        // save the product
        $product->save();

        return redirect(route('products.show', $product->id))
            ->with('message', 'Product is added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        return view('products.edit')
            ->with('product', $product)
            ->with('categories', Category::all());
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
        // create validation
        $this->authorize('update', $product);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|max:2000'
        ]);

        // update product
        $product->update($validatedData);

        // check if theres an image uploaded
        // if theres an image, save it and get the url

        if ($request->hasFile('image')) {
        
            // store the image
             $path = $request->file('image')->store('public/products');

            // this will return the url of the saved image
             $url = Storage::url($path);

             // set the new url of image
             $product->image = $url;
        }


        // save product
        $product->save();

        return redirect( route('products.show', $product->id))
            ->with('message', 'Product is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return redirect(route('products.index'))
            ->with('message', "Product {$product->name} has been deleted")
            ->with('alert', 'warning');
    }
}
