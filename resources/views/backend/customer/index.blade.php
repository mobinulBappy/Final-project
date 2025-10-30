@extends('layouts.backend-layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                    @foreach ($cus as $key=>$cu)
                    <tr>
                        <td>{{ $cus->firstItem()+$key }}</td>
                        <td>{{ $cu->name }}</td>
                        <td>{{ $cu->phone }}</td>
                        <td>{{ $cu->email }}</td>
                        <td class="text-center">{{ $cu->created_at}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="mt-2">
                    {{ $cus->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection