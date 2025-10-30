@extends('layouts.backend-layout')

@section('content')
        <div class="container-pluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">{{ $editedcategory ? 'Edit':'Add' }} Category</div>
                        <div class="card-body">
                           <form action="{{ route( $editedcategory ? 'category.update':'category.store',$editedcategory?->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($editedcategory)
                            @method('patch')
                            @endif
                             <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" name="title" id="" value="{{ $editedcategory?->title }}">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label class="d-block" for="">Category Icon</label>
                                @if ($editedcategory)
                                    <img class="my-1" width="50px" src="{{ asset('storage/'.$editedcategory?->icon) }}" alt="">
                                @endif
                                <input type="file" class="form-control" name="category_icon" id="">
                                @error('category_icon')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group my-1 mb-2">
                                <label for="">Parent Category</label>
                                <select class="form-control" name="parentCategory" id="">
                                    <option disabled selected>-- Select Category--</option>
                                    @foreach ($allcategories as $category)
                                        <option {{ $category->id == $editedcategory?->category_id ? 'selected':''}} value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary">{{ $editedcategory ? 'Update':'Add' }} Category</button>
                           </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Category Lists</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Category Name</th>
                                        <th class="text-center">Featured</th>
                                        <th class="text-center">Action</th>
                                    </tr>

                             @forelse ($categories as $key=>$category)                         
                                    <tr>
                                        <td>{{ $categories->firstItem()+$key }}</td>
                                        <td><img width="50px" src="{{ asset('storage/'.$category->icon) }}" alt=""> {{ $category->title }}</td>
                                        <td class="text-center">
                                            <a class="text-warning" href="{{ route('category.featured',$category->id) }}"><i class="bx bx{{ $category->featured ? 's':'' }}-star"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('category.index',$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{ route('category.destroy',$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>

                              @if ($category->subcategories)
                                @foreach ($category->subcategories as $subcategory)
                                         <td>---</td>
                                        <td><img width="50px" src="{{ asset('storage/'.$subcategory->icon) }}" alt="">{{ $subcategory->title }}</td>
                                        <td class="text-center">
                                            <a class="text-warning" href="{{ route('category.featured',$subcategory->id) }}"><i class="bx bx{{ $subcategory->featured ? 's':'' }}-star"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('category.index',$subcategory->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                              @endif

                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center"><p>No Ctaegory Has Been Found!!</p></td>
                                        </tr>
                                     @endforelse

                                </table>
                                <div class="mt-2">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
@endsection