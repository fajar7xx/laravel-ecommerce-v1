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
                        <i class="ik ik-settings bg-blue"></i>
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
                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @include('admin.partials.flash')
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="pills-general-tab" data-toggle="pill" href="#general" role="tab" aria-controls="pills-general" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-logo-tab" data-toggle="pill" href="#logo" role="tab" aria-controls="pills-logo" aria-selected="false">Site Logo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-footer-tab" data-toggle="pill" href="#footer" role="tab" aria-controls="pills-footer" aria-selected="false">Footer and Seo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-social-tab" data-toggle="pill" href="#social" role="tab" aria-controls="pills-social" aria-selected="false">Social Links</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-analitycs-tab" data-toggle="pill" href="#analitycs" role="tab" aria-controls="pills-analitycs" aria-selected="false">Analitycs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-payments-tab" data-toggle="pill" href="#payments" role="tab" aria-controls="pills-payments" aria-selected="false">Payments</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="pills-general-tab">
                           @include('admin.settings.includes.general')
                        </div>
                        <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="pills-logo-tab">
                            @include('admin.settings.includes.logo')
                        </div>
                        <div class="tab-pane fade" id="footer" role="tabpanel" aria-labelledby="pills-footer-tab">
                            @include('admin.settings.includes.footer_seo')
                        </div>
                        <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="pills-social-tab">
                            @include('admin.settings.includes.social_links')
                        </div>
                        <div class="tab-pane fade" id="analitycs" role="tabpanel" aria-labelledby="pills-analitycs-tab">
                            @include('admin.settings.includes.analitycs')
                        </div>
                        <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="pills-payments-tab">
                            @include('admin.settings.includes.payments')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection