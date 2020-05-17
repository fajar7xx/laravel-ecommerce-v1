@extends('site.app')

@section('title')
    Checkout | Ecommerce
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
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
            </div>
        </div>
        <form action="{{ route('checkout.place.order') }}" class="checkout-form" role="form" method="POST" >
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <a href="#" class="content-btn">Click Here To Login</a>
                    </div> --}}
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="first_name">First Name<span>*</span></label>
                            <input type="text" id="first_name" name="first_name">
                        </div>
                        <div class="col-lg-6">
                            <label for="last_name">Last Name<span>*</span></label>
                            <input type="text" id="last_name" name="last_name">
                        </div>
                        {{-- <div class="col-lg-12">
                            <label for="cun-name">Company Name</label>
                            <input type="text" id="cun-name">
                        </div> --}}
                        <div class="col-lg-12">
                            <label for="country">Country<span>*</span></label>
                            <input type="text" id="country" name="country">
                        </div>
                        <div class="col-lg-12">
                            <label for="address">Street Address<span>*</span></label>
                            <input type="text" id="address" name="address" class="street-first">
                        </div>
                        <div class="col-lg-12">
                            <label for="post_code">Postcode</label>
                            <input type="text" id="post_code" name="post_code">
                        </div>
                        <div class="col-lg-12">
                            <label for="city">City<span>*</span></label>
                            <input type="text" id="city" name="city">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email Address<span>*</span></label>
                            <input type="text" id="email" name="email">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone_number">Phone<span>*</span></label>
                            <input type="text" id="phone_number" name="phone_number">
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="notes">Order Notes</label>
                                <textarea name="notes" id="notes" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="create-item">
                                <label for="acc-create">
                                    Create an account?
                                    <input type="checkbox" id="acc-create">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- <div class="checkout-content">
                        <input type="text" placeholder="Enter Your Coupon Code">
                    </div> --}}
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>
                                @foreach (\Cart::getContent() as $item)
                                    <li class="fw-normal">{{ $item->name }} x {{  $item->quantity }}  <span>Rp. {{ $item->price * $item->quantity }}</span></li>
                                @endforeach
                                {{-- <li class="fw-normal">Subtotal <span>$240.00</span></li> --}}
                                <li class="total-price">Total <span>Rp. {{ \Cart::getSubTotal() }}</span></li>
                            </ul>
                            {{-- <div class="payment-check">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Cheque Payment
                                        <input type="checkbox" id="pc-check">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Paypal
                                        <input type="checkbox" id="pc-paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div> --}}
                            <div class="order-btn">
                                <button type="submit" class="site-btn place-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection