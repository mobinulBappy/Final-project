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
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Gold</td>
                        <td>0163232322</td>
                        <td>50000Tk</td>
                        <td>10/08/2006</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection