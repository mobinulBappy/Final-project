@extends('layouts.frontend-layout')


@section('content')
  

 <section id="product_sidbar">
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="product_thumb_slider">
                  @if ($product->image)
                    <div class="produtc_thumb_slider_item">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid">
                    </div>
                  @endif 
                  @if ($product->galleries && count($product->galleries) > 0)
                  @foreach ($product->galleries as $img)
                      <div class="produtc_thumb_slider_item">
                        <img src="{{ asset('storage/'.$img->gall_img) }}" alt="" class="img-fluid">
                    </div>
                      @endforeach
                   @endif
                </div>
                <div class="product_nav_slider">
                  @if ($product->image)
                    <div class="product_nav_slider_item">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-fluid">
                    </div>
                  @endif 
                   @if ($product->galleries && count($product->galleries) > 0)
                  @foreach ($product->galleries as $img)
                    <div class="product_nav_slider_item">
                        <img src="{{ asset('storage/'.$img->gall_img) }}" alt="" class="img-fluid">
                    </div>
                  @endforeach
                   @endif  
                </div>
            </div>
            <div class="col-lg-6">
               <div class="product-info" style="margin-top: 150px; margin-left: 50px;">
                 <h2 class="my-4">{{ $product->title }}</h2>
                 <p  class="my-3">
                  @if ($product->sell_price)              
                  <ins>{{ $product->sell_price }} Tk</ins>
                  <del>{{ $product->price }} Tk</del>
                  @else
                  <ins>{{ $product->price }} Tk</ins>
                  @endif
                 </p>
                 <div class="d-flex">
                 <div class="rating text-warning">
                         {!!  str()->repeat('<i class="fas fa-star"></i>' , round($product->reviews->avg('rating'))) !!}
                   {!!  str()->repeat('<i class="far fa-star"></i>' , 5- round($product->reviews->avg('rating'))) !!}
                 </div>
                 <p style="font-size: 14px; color: #333;" class="ms-2">({{ count($product->reviews ?? []) }} customer review)</p>
                </div>

                @auth('customer')
            <form action="{{ route('cart.store') }}" method="POST">
              @csrf
                <div class="d-flex mt-3">
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <input type="hidden" name="total_amount" value="{{ $product->sell_price ?? $product->price }}">
                  <div class="cart-box">
                    <button data-type="dec" type="button">-</button>
                    <input class="result w-25" type="number" name="qty" id="" value="1">
                    <button data-type="inc" type="button">+</button>
                  </div>
                  <button type="submit" class="btn btn-primary">Add To Cart</button>
                </div>
            </form>
            @else
              <a href="{{ route('customer.login') }}" class="btn btn-primary mt-3 w-50">Sign in</a>
             @endauth

               </div>
            </div>
        </div>
    </div>
  </section>


  
  <section id="tabs" class="mt-4">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <button type="button" class="active" data-bs-toggle="tab" data-bs-target="#description">Product Description</button>
            </li>
            <li class="nav-item">
                <button type="button" data-bs-toggle="tab" data-bs-target="#review">Customer Review(3)</button>
            </li>
            <li class="nav-item">
                <button type="button" data-bs-toggle="tab" data-bs-target="#additional_info">Additional Information</button>
            </li>
        </ul>
    </div>
    <div>
        <div class="tab-pane fade" id="description">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, delectus Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque a nam temporibus facilis magnam excepturi soluta perspiciatis nobis! Voluptas, magni.</p>
        </div>
         <div class="tab-pane fade" id="additional_info">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, delectus Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque a nam temporibus facilis magnam excepturi soluta perspiciatis nobis! Voluptas, magni.</p>
        </div>

       <div class="tab-pane fade" id="review">
           <div class="review-card">
            <div class="row">
                <div class="col-lg-8">
                  @foreach ($product->reviews as $review) 
                    <div class="review-info d-flex my-3">
                        <div class="profile_img">
                            <img src="{{ getprofileImage('customer') }}" alt="" class="img-fluid">
                        </div>
                        <div class="profile-info">
                        <div class="text-warning">
                            {!!  str()->repeat('<i class="fas fa-star"></i>' , $review->rating) !!}
                        {!!  str()->repeat('<i class="far fa-star"></i>' , 5- $review->rating) !!}
                      
                        </div>
                        <h5>{{ $review->customer->name }} <span>{{ $review->created_at->format('M, '. 'd '. 'Y') }}</span> </h5>
                        <p>{{ $review->detail }}</p>
                      </div>
                    </div>
                    @endforeach
                    </div>

                    
                    <div class="col-lg-4">
                  @auth('customer')
                    <div class="review-form">
                        <h5>Add a Review</h5>
                        <p class="my-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <form action="{{ route('review.store') }}" method="POST">
                          @csrf
                          <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                            <label for="">Your Rating<span class="text-danger">*</span>
                            <input type="number" name="rating" id="" class="w-25 text-center" value="0" max="5">
                            </label>
                           </div>
                           <div class="form-group mt-3 me-3">
                            <label for="">Others Note (option)</label>
                            <textarea name="detail" class="form-control" id="" placeholder="Your Comment"></textarea>
                           </div>
                           <button class="btn btn-primary mt-2">Submit Comment</button>
                        </form>
                    </div>
                    @else
                          <a href="{{ route('customer.login') }}"><button class="btn btn-primary mt-2">Sign In</button></a>
                    @endauth
                </div> 
            </div>

           </div>
        </div>

    </div>
  </section>


@endsection


