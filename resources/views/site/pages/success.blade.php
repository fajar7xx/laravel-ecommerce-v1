@extends('site.app')

@section('title')
    Orde Completed
@endsection

@section('content')
    <!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Order Completed</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success" role="alert">
                <strong>success</strong> Your order placed successfully
            </div>
        </div>
    </div>
</div>
@endsection