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
                        <th>Amount</th>
                        <th class="text-center">Date</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    @foreach ($orders as $key=>$order)
                    <tr>
                        <td>{{ $orders->firstItem()+$key }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->amount }}Tk</td>
                        <td class="text-center">{{ $order->created_at}}</td>
                        <td>Confirm..</td>
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
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection