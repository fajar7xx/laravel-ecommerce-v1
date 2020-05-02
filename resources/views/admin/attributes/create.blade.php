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
                    <i class="ik ik-bookmark bg-info"></i>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-block w-100">Attribute Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.attributes.store') }}" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="code">Code  <span class="ml-5 text-danger">*</span></label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="Enter Attribtue code" value="{{ old('code') }}">
                            @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Name  <span class="ml-5 text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Attribtue name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="frontend_type">Frontend Type  <span class="ml-5 text-danger">*</span></label>
                            @php
                                $types = [
                                    'select' => 'Select Box',
                                    'radio' => 'Radio Button',
                                    'text' => 'Text Field',
                                    'text_area' => 'Text Area'
                                ];
                            @endphp
                             <select name="frontend_type" id="frontend_type" class="form-control custom-select mt-15 @error('frontend_type')  is-invalid @enderror">
                                <option value="0">Select Frontend Type</option>
                                @foreach ($types as $type => $label)
                                    <option value="{{ $type }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('frontend_type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_filterable" name="is_filterable">
                                <span class="custom-control-label">Filterable</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_required" name="is_required">
                                <span class="custom-control-label">Required</span>
                            </label>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Save Attribute</button>
                            <a href="{{ route('admin.attributes.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection