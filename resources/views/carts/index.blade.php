@extends('layouts.app')
@section('content')
    {{-- {{dd($products)}} --}}
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">
                    My Cart
                </h1>
            </div>
        </div>
        @include('sweetalert::alert')

        @if(!Session::has('cart'))
            {{-- alert start --}}
            <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>Your cart is empty!</strong> 
            </div>
        
        
        {{-- alert end --}}
        @else

            <div class="row">
                <div class="col-12">
                    {{-- start cart table --}}

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- start item row --}}
                            @foreach($products as $product)
                                <tr>
                                    <td scope="row">{{$product->name}}</td>
                                    <td>
                                      <form action="{{ route('cart.update', $product->id) }}"
                                        method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="input-group mb-3">
                                            <input 
                                              type="number" 
                                              min="1" 
                                              class="form-control form-control-sm"
                                              name="quantity"
                                              value="{{$product->quantity}}" 
                                            >
                                            <div class="input-group-append">
                                              <button 
                                              class="btn btn-outline-secondary btn-sm" type="submit" id="button-addon2">
                                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M5.707 13.707a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391L10.086 2.5a2 2 0 0 1 2.828 0l.586.586a2 2 0 0 1 0 2.828l-7.793 7.793zM3 11l7.793-7.793a1 1 0 0 1 1.414 0l.586.586a1 1 0 0 1 0 1.414L5 13l-3 1 1-3z"/>
                                                <path fill-rule="evenodd" d="M9.854 2.56a.5.5 0 0 0-.708 0L5.854 5.855a.5.5 0 0 1-.708-.708L8.44 1.854a1.5 1.5 0 0 1 2.122 0l.293.292a.5.5 0 0 1-.707.708l-.293-.293z"/>
                                                <path d="M13.293 1.207a1 1 0 0 1 1.414 0l.03.03a1 1 0 0 1 .03 1.383L13.5 4 12 2.5l1.293-1.293z"/>
                                              </svg>
                                            </button>
                                            </div>
                                            </div>
                                      </form>
                                      
                                    </td>
                                    <td>&#8369; {{number_format($product->price, 2)}}</td>
                                    <td>&#8369; {{number_format($product->subtotal,2)}}</td>
                                    <td>

                                        <form action="{{route('cart.destroy', $product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Remove</button>
                                        </form>
    

                                        
                                    </td>
                                </tr>
                            @endforeach
                            {{-- end item row --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">Total</td>
                                <td><strong>&#8369; {{number_format($total,2)}}</strong></td>
                                <td>
                                  @guest
                                    <a href="{{ route('login')}}" class="btn btn-sm btn-success w-100 my-1">Login to checkout</a>
                                  @else
                                    
                                    <form action="{{ route('transactions.store') }}" method="post">
                                      @csrf
                                      <button class="btn btn-sm btn-success">Checkout</button>
                                    </form>
                                  @endguest
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                    {{-- end cart table --}}
                </div>
            </div>

            {{-- clear cart --}}
            <div class="row">
                <div class="col-12">
                    <form action="{{route('cart.delete')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Clear Cart</button>
                    </form>
                </div>
            </div>
        @endif

    </div>
    
@endsection