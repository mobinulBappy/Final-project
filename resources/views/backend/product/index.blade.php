@extends('layouts.backend-layout')

@section('content')
        <div class="container-pluid">
            <div class="card">
                <div class="cart-header m-3">Product Lists</div>
                <div class="card-body">
                   <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Sl.</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Selling Price</th>
                            <th>Sku</th>
                            <th>Stock</th>
                            <th class="text-center">Featured</th>
                            <th>Gallery Image</th>
                            <th class="text-center">Action</th>
                        </tr>

                        @foreach ($products as $key=>$product)
                        <tr>
                            <td>{{ $products->firstItem()+$key }}.</td>
                            <td><img width="30px" src="{{ asset('storage/'.$product->image) }}" alt="">{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->sku }}</td>
                            <td class="text-center">{{ $product->stock }}</td>
                            <td class="text-center">
                                <a class="text-warning" href="{{ route('product.featured',$product->id) }}"><i class="bx bx{{ $product->featured ? 's':'' }}-star"></i></a>
                            </td>
                            <td>
                                @foreach ($product->galleries as $gallery)           
                                <img width="30px" src="{{ asset('storage/'.$gallery->gall_img) }}" alt="" class="img-fluid">
                                @endforeach
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('product.create',$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('product.destroy',$product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                         @endforeach


                    </table>
                    <div class="mt-2">
                        {{ $products->links() }}
                    </div>
                   </div>
                </div>
            </div>
        </div>
@endsection