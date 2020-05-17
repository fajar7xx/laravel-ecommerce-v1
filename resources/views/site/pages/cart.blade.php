@extends('site.app')

@section('title')
    Shopping Cart | Ecommerce
@endsection

@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Product</a>
                    <span>Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if (\Cart::isEmpty())
                    <div class="alert alert-warning" role="alert">
                        Your Shopping cart is empty
                    </div>
                @else    
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col" class="p-name">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">
                                        <i class="ti-close"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\Cart::getContent() as $item)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            @if ($item->conditions != null)
                                                <img src="{{ asset('storage/' . $item->conditions) }}" class="img-thumbnail" width="100px">
                                            @else
                                                <img src="https://via.placeholder.com/176" class="img-thumbnail" width="100px">
                                            @endif
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5>{{ Str::words($item->name, 20) }}</h5>
                                            @foreach ($item->attributes as $key =>$value)
                                                <dl class="dlist-inline small">
                                                    <dt>{{ ucwords($key) }} : {{ ucwords($value) }}</dt>
                                                </dl>
                                            @endforeach
                                        </td>
                                        <td class="p-price first-row">Rp. {{ $item->price }}</td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                {{-- <div class="pro-qty">
                                                    <input type="text" value="1">
                                                </div> --}}
                                                {{ $item->quantity }}
                                            </div>
                                        </td>
                                        <td class="total-price first-row">Rp. {{ $item->price * $item->quantity }}</td>
                                        <td class="close-td first-row">
                                            <a href="{{ route('checkout.cart.remove', $item->id) }}" onclick="return confirm('Are you sure want to delete this item ?')">
                                                <i class="ti-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="{{ route('checkout.cart.clear') }}" class="primary-btn up-cart">Clear All Cart</a>
                            {{-- <a href="#" class="btn btn-outline-primary">Update cart</a> --}}
                        </div>
                        {{-- <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Enter your codes">
                                <button type="submit" class="site-btn coupon-btn">Apply</button>
                            </form>
                        </div> --}}
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                {{-- <li class="subtotal">Subtotal <span>RP. {{ \Cart::getSubTotal() }}</span></li> --}}
                                <li class="cart-total">Total <span>Rp. {{ \Cart::getSubTotal() }}</span></li>
                            </ul>
                            <a href="{{ route('checkout.index') }}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection