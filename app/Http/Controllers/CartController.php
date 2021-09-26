<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('cart')){


        $products = Product::find(array_keys(session('cart')));
        $total = 0;
        // add the subtotal and compute for total price
        foreach ($products as $product) {
          // insert quantity property
          $product->quantity = session("cart.$product->id");
          // compute and insert for subtotal property
          $product->subtotal = $product->price * $product->quantity;
          // update total price
          $total += $product->subtotal;

        }

            return view('carts.index')
                ->with('products', $products)
                ->with('total', $total);
        } else {
            return view('carts.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // first validate the quantity input
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $quantity = $request->quantity; // Getting the quantity
        // $productId = $id; // Getting the
        // return $productId; // test if working 

        // store to session
        // $cart = [
        //     id => quantity
        // ]

        $request->session()->put("cart.$id", $quantity);

        // dd(session('cart'));
        return redirect( route('cart.index'))
         ->with('success',"Product added in cart successfully.");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        session()->forget("cart.$id");

        // check if session cart is empty
        if (count(session()->get('cart')) === 0) {
            session()->forget('cart');
        }
        
        return back()
        ->with('success',"Product successfully removed in cart.");
    }

    public function delete()
    {
        session()->forget('cart');

        return back()
          ->with('success',"All items are deleted.");;
    }
}
