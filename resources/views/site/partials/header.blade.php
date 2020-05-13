    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        cs_ecommerce@mail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +62 61 12345
                    </div>
                </div>
                <div class="ht-right">
                    @guest
                        <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                        <a href="{{ route('register') }}" class="login-panel px-3"><i class="fa fa-user"></i>Register</a>
                    @endguest
                    
                    @auth
                        <a class="login-panel px-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" class="login-panel px-3"><i class="fa fa-user"></i>My Account</a>
                    @endauth

                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('frontend') }}/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img
                                                            src="{{ asset('frontend') }}/img/select-product-1.jpg"
                                                            alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img
                                                            src="{{ asset('frontend') }}/img/select-product-2.jpg"
                                                            alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            @foreach ($categories as $cat)
                                @foreach ($cat->items as $category)
                                    @if ($category->items->count() > 0)
                                        <li>
                                            <a href="{{ route('category.show', $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                            <ul class="dropdown">
                                                @foreach ($category->items as $item)
                                                    <a href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>            
                                    @endif
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        @foreach ($categories as $cat)
                            @foreach ($cat->items as $category)
                                @if ($category->items->count() > 0)
                                    <li>
                                        <a href="{{ route('category.show', $category->slug) }}">
                                            {{ $category->name }}
                                        </a>
                                        <ul class="dropdown">
                                            @foreach ($category->items as $item)
                                                <li>
                                                    <a href="{{ route('category.show', $item->slug) }}" class="dropdown-item">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>            
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>
<!-- Header End -->
