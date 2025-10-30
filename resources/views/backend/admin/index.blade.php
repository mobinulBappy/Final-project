@extends('layouts.backend-layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                    @foreach ($admins as $key=>$admin)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="text-center">{{ $admin->created_at}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection