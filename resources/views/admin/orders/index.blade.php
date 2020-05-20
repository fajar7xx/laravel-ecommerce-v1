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
                    <h3 class="d-block w-100">Data Table</h3>
                    {{-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right">
                        <i class="ik ik-plus"></i>
                        Add Products
                    </a> --}}
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="table-pproducts" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Placed By</th>
                                <th class="text-center">Total Amount</th>
                                <th class="text-center">Items Qty</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Status</th>
                                <th class="text-center text-danger" style="width:100px; min-width:100px"> <i class="ik ik-alert-circle"></i> </th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($orders as $order)
                               <tr>
                                   <td>{{ $order->order_number }}</td>
                                   <td>{{ $order->user->fullname }}</td>
                                   <td>Rp. {{ $order->grand_total }}</td>
                                   <td>{{ $order->item_count }}</td>
                                   <td>
                                       @if ($order->payment_status == 1)
                                           <span class="badge badge-success">Completed</span>
                                       @else
                                           <span class="badge badge-warning">Not Completed</span>
                                       @endif
                                   </td>
                                   <td>
                                       <span class="badge badge-success">{{ $order->status }}</span>
                                   </td>
                                   <td class="text-center">
                                       <a href="{{ route('admin.orders.show', $order->order_number) }}" class="btn btn-primary">Detail</a>
                                   </td>
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