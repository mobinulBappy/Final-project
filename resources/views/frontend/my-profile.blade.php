
@extends('layouts.frontend-layout')

@section('content')
<section id="profile">
    <div class="container my-5">
        <div class="mb-1">
            <img width="80px" height="80px" style="border-radius: 50%;" src="{{ getprofileImage('customer') }}" alt="" class="img-fluid">
        </div>
        <h6>Hello {{ auth('customer')->user()->name }} Customer</h6>
        <p style="font-size: 14px; color: #b1abab;">Ecobazar Member Since Oct 19 2003</p>
        <div class="row mt-2">
            <div class="col-lg-3">
                <div class="list-group border border-2">
                    <a href="#home" class="list-group-item-action active" data-bs-toggle="list"><i class="fa-solid fa-grip me-3"></i>Dashboard</a>
                    <a href="#orders" class="list-group-item-action" data-bs-toggle="list"><i class="fa-brands fa-shopify me-3"></i>Orders</a>
                    <a href="#downloads" class="list-group-item-action" data-bs-toggle="list"><i class="fa-solid fa-file-arrow-down me-3"></i>Downloads</a>
                    <a href="#address" class="list-group-item-action" data-bs-toggle="list"><i class="fa-solid fa-house me-3"></i>Address</a>
                    <a href="#accounts" class="list-group-item-action" data-bs-toggle="list"><i class="fa-solid fa-user me-3"></i>Accounts</a>
                    <a href="" class="list-group-item-action" data-bs-toggle="list"><i class="fa-solid fa-arrow-right-to-bracket me-3"></i>Logout</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="tab-content">
                    <div class="tab-pane fade show active mt-3" role="tabpanel" id="home">
                        <h6>Hello Mobin (not <strong>Annine</strong>? <span class="text-danger"><a href="{{ route('signout') }}">Log Out</a></span>)</h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum sed explicabo asperiores iste. Ad adipisci facere laborum voluptas optio inventore.</p>
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="orders">
                        <div class="table responsive">
                            <table class="table">
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>10 oct 2003</td>
                                    <td>proccess</td>
                                    <td>3000Tk</td>
                                    <td class="text-center"> 
                                        <a href="" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="downloads"></div>
                    <div class="tab-pane fade" role="tabpanel" id="address"></div>
                    <div class="tab-pane fade ms-5 mt-4" role="tabpanel" id="accounts">
                        <div class="form">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input class="form-control w-50" type="password" name="name" id="">
                            </div>
                            <h5 class="mt-3">Password Change</h5>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input class="form-control w-50" w-25 type="password" name="password" id="">
                            </div>
                            <div class="form-group my-1">
                                <label for="">New Password</label>
                                <input class="form-control w-50" type="password" name="password" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Confirn New Password</label>
                                <input class="form-control w-50" type="password" name="confirmation_password" id="">
                            </div>
                            <button class="btn btn-primary mt-2">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection