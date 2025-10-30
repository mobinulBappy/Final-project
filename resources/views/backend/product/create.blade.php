@extends('layouts.backend-layout')

@section('content')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/select2.min.css') }}">
@endpush
  <div class="container">
    <div class="card">
        <div class="card-header">{{ $editedproduct ? 'Edit':'Add' }} Product</div>
        <div class="card-body">

      <form action="{{ route($editedproduct ? 'product.update':'product.store',$editedproduct?->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($editedproduct)
        @method('patch')
        @endif
              <div class="form-group">
                <label for="">Product Name <span class="text-danger">*</span> </label>
                <input class="form-control" type="text" name="title" id="" value="{{ $editedproduct?->title }}">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="row my-2">
                <div class="col-lg-3">
                    <div class="form-group">
                    <label for="">Regullar Price<span class="text-danger">*</span> </label>
                    <input class="form-control" type="number" name="price" id="" value="{{ $editedproduct?->price }}">
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                    <label for="">Selling Price</label>
                    <input class="form-control" type="number" name="sell_price" id="" value="{{ $editedproduct?->sell_price }}">
                    @error('sell_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                    <label for="">Sku</label>
                    <input class="form-control" type="text" name="sku" id="" value="{{ $editedproduct?->sku }}">
                    @error('sku')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                    <label for="">Stock</label>
                    <input class="form-control" type="number" name="stock" id="" value="{{ $editedproduct?->stock ?? 0 }}">
                    @error('stock')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
            </div>

            <div class="row my-2">
                 <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="d-block">Featured Image</label>
                    @if ($editedproduct)
                        <img width="40px" class="my-1" src="{{ asset('storage/'.$editedproduct->image) }}" alt="">
                    @endif
                    <input class="form-control" type="file" name="image" id="">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="d-block">Gallery Image</label>
                     @if ($editedproduct)
                        @foreach ($editedproduct->galleries as $gallery)
                        <img width="40px" class="my-1" src="{{ asset('storage/'.$gallery->gall_img) }}" alt="">
                        @endforeach
                    @endif
                    <input class="form-control" type="file" multiple name="gall_img[]" id="">
                    @error('gall_img')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
            </div>

            <div class="form-group my-2">
                <label for="">Short Detail</label>
                <textarea class="form-control" name="short_detail" id="">{{ $editedproduct?->short_detail }}</textarea>
            </div>
            <div class="form-group my-2">
                <label for="">Long Detail</label>
                <textarea class="form-control" name="long_detail" id="">{{ $editedproduct?->long_detail }}</textarea>
            </div>
            <div class="form-group my-2">
                <label for="">Additional Information</label>
                <textarea class="form-control" name="additional_info" id="">{{ $editedproduct?->edditional_info }}</textarea>
            </div>

            <div class="form-group my-2">
                <select class="form-control select2" name="categories[]" multiple id="">                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-end">
                <button class="btn btn-primary">{{ $editedproduct ? 'Update':'Add' }} Product</button>
            </div>
      </form>


        </div>
    </div>
  </div>

  @push('scripts')
  <script src="{{ asset('backend/assets/js/select2.min.js') }}"></script>
  <script>
    $(document).ready(function() {
        $('.select2').select2({
              placeholder: "Select a Category",
        });
    });
  </script>
  @endpush
@endsection