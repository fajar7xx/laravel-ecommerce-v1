@extends('admin.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
<div class="container-fluid">

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-shopping-bag bg-info"></i>
                    <div class="d-inline">
                        <h5>{{ $pageTitle }}</h5>
                        <span>{{ $subTitle }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @include('admin.partials.flash')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-block w-75">Order Detail</h3>
                    <span class="float-right">
                        {{ $order->order_number }}
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                            <strong>Billed To:</strong><br>
                                {{ $order->user->fullname }}<br>
                                {{ $order->address }}<br>
                                {{ $order->city . ',' . $order->country }}<br>
                                {{ $order->post_code }}
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                            <strong>Shipped To:</strong><br>
                                {{ $order->first_name .' '. $order->last_name }}<br>
                                {{ $order->address }}<br>
                                {{ $order->city . ',' . $order->country }}<br>
                                {{ $order->post_code }}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Payment Method:</strong><br>
                                Payment Mehtod : {{ $order->payment_method }}<br>
                                Payment Status : {{ $order->payment_status == 1 ? 'Completed' : 'Not Completed' }} <br>
                                Order Status : {{ $order->status }} <br>
                                {{ $order->user->email }}
                            </address>
                        </div>
                        <div class="col-md-6">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{ $order->created_at }}<br><br>
                            </address>
                        </div>
                    </div>
                    <hr>
                    <h4>Order Summary</h4>
                    <table class="table table-hover table-bordered" id="table-pproducts" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->product->sku }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ round($item->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="align-right">Total</td>
                                    <td>{{ round($order->grand_total, 2) }}</td>
                                </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection