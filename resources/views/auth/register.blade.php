@extends('site.app')

@section('title')
    Register | Ecommerce
@endsection

@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="{{ route('register') }}" method="POST" role="form">
                            @csrf
                            <div class="group-input">
                                <label for="first_name">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="last_name">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" rows="5" class="form-control">{{ old('address') }}</textarea>
                            </div>
                            <div class="group-input">
                                <label for="city">City</label>
                                <input type="text" id="city" name="city" class="form-control" value="{{ old('city') }}">
                            </div>
                            <div class="group-input">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control">
                                    <option value="">Choose.....</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Thailand">Thailand</option>
                                </select>
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                            <small class="text-muted">By clicking the 'REGISTER' button, you confirm that you accept our <span class="font-weight-bold">Terms of use and Privacy Policy. </span></small>
                        </form>
                        <div class="switch-login">
                            <a href="{{ route('login') }}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
@endsection