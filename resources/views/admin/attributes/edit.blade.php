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
        <div class="col-3">
            <div class="card">
                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a href="#general" class="nav-link active" id="general-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a href="#values" class="nav-link" id="values-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">Attribute Values</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="d-block w-100">Attribute Information</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.attributes.update' ,$attribute->id) }}" method="POST" role="form">
                                @method('patch')
                                @csrf
                                <input type="hidden" name="id" value="{{ $attribute->id }}">
                                <div class="form-group">
                                    <label for="code">Code  <span class="ml-5 text-danger">*</span></label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="Enter Attribtue code" value="{{ old('code', $attribute->code) }}">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="name">Name  <span class="ml-5 text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Attribtue name" value="{{ old('name', $attribute->name) }}">
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
                                            @if ($attribute->frontend_type == $type)
                                                <option value="{{ $type }}" selected>{{ $label }}</option>
                                            @else
                                            <option value="{{ $type }}">{{ $label }}</option>
                                            @endif
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
                                        <input type="checkbox" class="custom-control-input" id="is_filterable" name="is_filterable" {{ $attribute->is_filterable == 1 ? 'checked' : '' }}>
                                        <span class="custom-control-label">Filterable</span>
                                    </label>
                                </div>
        
                                <div class="form-group">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="is_required" name="is_required" {{ $attribute->is_required == 1 ? 'checked' : '' }}>
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
                <div class="tab-pane" id="values" role="tabpanel" aria-labelledby="values-tab">
                    <attribute-values :attributeid="{{ $attribute->id }}"></attribute-values>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@section('js')
<script src="{{ asset('backend/js/app.js') }}"></script>
@endsection