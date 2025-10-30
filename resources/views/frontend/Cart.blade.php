
@extends('layouts.frontend-layout')

@section('content')
<section class="my-5">
    <div class="container">
       <form action="{{ route('cart.update') }}" method="POST">
        @csrf
        @method('patch')
         <table class="table border border-2">
            <tr>
                <th>Sl.</th>
                <th class="text-center">Name</th>
                <th>Price</th>
                <th class="text-center">Quntity</th>
                <th>Price</th>
            </tr>

        
        @php
            $total = 0;
        @endphp

            @foreach ($carts as $cart)
            
          
            <tr>
                <td><a href="{{ route('cart.destroy',$cart->id) }}"><i style="width: 30px; height: 30px; border-radius: 50%; line-height: 30px; text-align: center;" class="fa-solid fa-xmark bg-dark text-light"></i></a></td>
                <td class="text-center"><img width="50px" src="{{ asset('storage/'.$cart->product->image) }}" alt="">{{ $cart->product->title }}</td>
                <td>{{ $cart->product->sell_price ?? $cart->product->price }}</td>
                <td class="text-center">
                <div class="cart-box">
                 <button type="button" data-type="dec" class="py-1 px-3">-</button>
                 <input  type="text" class="text-center result w-25" name="qty[{{ $cart->product->id }}]" id=""  value="{{ $cart->qty ?? 0 }}">
                 <button type="button" data-type="inc" class="py-1 px-3">+</button>
               </div>
                </td>
                <td>{{ ($cart->product->sell_price ?? $cart->product->price) * $cart->qty }}</td>
            </tr>
            
            @php
             $total += ($cart->product->sell_price ?? $cart->product->price) * $cart->qty
            @endphp
            @endforeach 
        </table>

         <div class="d-flex justify-content-end me-5">
            <h5 class="me-5">Total Amount</h5>
            <h6>{{$total }}Tk</h6>
        </div>
    
       <div class="text-end me-5">
        <a href="{{ route('cart.update') }}"><button class="btn btn-primary  mt-3">Update Cart</button></a>
       <button class="btn btn-danger mt-3"><a class="text-light" href="{{ route('chackout.index') }}">Chawkout</a></button>
       </div>
       </form>
               
   
    </div>
</section>
@endsection