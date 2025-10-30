@extends('layouts.frontend-layout')

@section('content')

    <section id="banner">
        <div class="container my-2">
            <div class="row">
                <div class="slider col-lg-8">
                   <div class="slider-banner">
                    <div><img src="{{ asset('frontend/assets/image/banner/img 1.png') }}" alt="" class="img-fluid"></div>
                    <div><img src="{{ asset('frontend/assets/image/banner/img 2 (1).png') }}" alt="" class="img-fluid"></div>
                    <div><img src="{{ asset('frontend/assets/image/banner/img 3.png') }}" alt="" class="img-fluid"></div>
                   </div>
                </div>
                <div class="col-lg-4 d-flex justify-content-between flex-column">
                     <div class="banner-card">
                    <img src="{{ asset('frontend/assets/image/banner/img 2 (1).png') }}" alt="" class="img-fluid">
                    </div>
                     <div class="banner-card">
                    <img src="{{ asset('frontend/assets/image/banner/img 3.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="category" class="mb-4">
         <h4 class="text-center mb-2">All Category</h4>
        <div class="container">
            @foreach ($categories as $category)
            <div class="category-card">
                <a href="{{ route('frontend.product.shop')}}">
                    <img style="max-height:60px" src="{{ $category->icon ? asset('storage/'.$category->icon) : asset('istockphoto.jpg') }}" alt="" class="img-fluid mb-2">
                    <h6>{{ $category->title }}</h6>
                </a>
            </div>
            @endforeach
        </div>
        
    </section>

    <section id="product">
        <div class="container">
              <h3 class="ms-auto mb-2">Top Selling</h3>
            <div class="row">

                @foreach ($products as $product)
                 <div class="col-lg-3">
                    <div class="product-cart">
                        <div class="product-cart-img">
                        <img style="max-height:190px" src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid">
                    </div>
                    <div class="product-cart-info">
                        <h5>{{ $product->title }}</h5>
                        <p>
                            @if ($product->sell_price)                          
                            <ins>{{ $product->sell_price }}Tk</ins>
                            <del>{{ $product->price }}Tk</del>
                            @else
                            <ins>{{ $product->price }}Tk</ins>
                            @endif
                        </p>
                        <a href="{{ route('frontend.product.sidbar',$product->slug) }}"><button><i class="fa-solid fa-cart-shopping"></i>Order Now</button></a>
                    </div>
                    <div class="discount">
                        @if ($product->sell_price)           
                        <span>{{ ceil((($product->price - $product->sell_price) * 100 )/$product->price) }}%</span>
                        @endif
                    </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>

    <div class="text-center my-3">
       <a href="{{ route('frontend.product.shop') }}">
         <button class="btn btn-dark py-2 px-5">All Product</button>
       </a>
    </div>


@endsection