@extends('layouts.frontend-layout')

@section('content')

<div class="container mt-3">
    <div class="bg-dark p-3 text-light text-center">
        <h2>Chackout</h2>
    </div>
    <form action="{{ route('chackout.store') }}" method="POST">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-8 shadow">
            <div class="card p-5 border-0">
                <h5 class="mb-3">Billing Address</h5>
                    <div class="form-group">
                        <label for="">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control w-75 rounded-0 border-3" id="" value="{{ auth('customer')->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control w-75 rounded-0 border-3" id="" value="{{ auth('customer')->user()->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Phone<span class="text-danger">*</span></label>
                        <input type="tel" name="phone" class="form-control w-75 rounded-0 border-3" id="" placeholder="+88" value="{{ auth('customer')->user()->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control w-75 rounded-0 border-3" id="" value="{{ auth('customer')->user()->address }}">
                    </div>
                    <div class="form-group">
                        <label for="">Shipping Address</label>
                        <input type="text" name="shipping_address" class="form-control w-75 rounded-0 border-3" id="" value="{{ auth('customer')->user()->shipping_address }}">
                    </div>
                    <div class="form-group">
                            <label for="">Country</label>
                            <select class="form-control w-75 rounded-0 border-3" name="country" id="">
                                <option value="">Bangladesh</option>
                            </select>
                     </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                            <label for="">State</label>
                            <select class="form-control rounded-0 border-3" name="state" id="">
                                @foreach ($districts as $district)                          
                                <option value="{{$district['name']}}">{{ $district['name'] }}</option>
                                @endforeach
                            </select>
                         </div>
                        </div>
                         <div class="col-lg-4">
                            <div class="form-group">
                            <label for="">Zip</label>
                         <input type="text" class="form-control rounded-0 border-3" name="zip" id="">
                         </div>
                        </div>
                        <input type="hidden" name="amount" value="">
                    </div>
                    <button class="btn btn-primary w-75 rounded-0 mt-3">Chackout</button>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow p-3 border-0">
                <div class="d-flex justify-content-between mb-4">
                    <h5 class="mt-1">Your Card</h5>
                   <p class="text-light text-center" style="width:25px; height: 25px; border-radius: 50%; background-color: #333; line-height: 25px;">2</p>
                </div>

                @php
                $total = 0;
                @endphp
                @foreach ($carts as $cart)
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="mt-1">{{ $cart->product->title }} * {{ $cart->qty }}</h6>
                    <p>{{ ($cart->product->sell_price ?? $cart->product->price)*$cart->qty  }}Tk</p>
                </div>
                @php
                    $total += ($cart->product->sell_price ?? $cart->product->price)*$cart->qty;
                @endphp
                @endforeach

                 <hr>

                 <div class="d-flex justify-content-between">
                    <label for="dhaka-outdoor">
                    <input type="radio" name="delivery_area" id="dhaka-outdoor" value="outdoor">
                    Dhaka Outdoor
                    </label>
                    <h6>120Tk</h6>
                </div>
                <div class="d-flex justify-content-between">
                   <label for="dhaka-indoor">
                    <input type="radio" name="delivery_area" id="dhaka-indoor" value="indoor">
                    Dhaka Indoor
                    </label>
                    <h6>70Tk</h6>
                </div> 
                <hr>
                <div class="d-flex justify-content-between">
                    <h6 class="mt-1">Total (BDT)</h6>
                     <h6 id="totalAmount">{{ $total + 70 }}Tk</h6>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@push('scripts')
    <script>

    $(function() {
        $subtotal = {{ $total }}

        $('input[name="delivery_area"]').on('change',function(){
           let area = $(this).val();
           let shipping = (area === 'indoor') ? 70 : 120;
           let total = $subtotal + shipping ;
           $('#totalAmount').text(total+'Tk');
        })
    })


    </script>
@endpush


@endsection