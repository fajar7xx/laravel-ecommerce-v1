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
                    <i class="ik ik-tag bg-green"></i>
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
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                    <h3 class="d-block w-100">Update Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.update', $targetCategory->id) }}" method="POST" role="form" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="id" value="{{ $targetCategory->id }}">
                        <div class="form-group">
                            <label for="name">Name <span class="ml-5 text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $targetCategory->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control  @error('description') is-invalid @enderror">{{ old('description' , $targetCategory->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Parent Category <span class="ml-5 text-danger">*</span></label>
                            <select name="parent_id" id="parent_id" class="form-control custom-select mt-15 @error('parent_id')  is-invalid @enderror">
                                <option value="0">Select a parent category</option>
                                @foreach ($categories as $key => $category)
                                    @if ($targetCategory->parent_id == $key)
                                        <option value="{{ $key }}" selected>{{ $category }}</option>                                        
                                    @else
                                        <option value="{{ $key }}">{{ $category }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" name="featured" id="featured" class="form-check-input">
                                <label for="featured">Fetured Category</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" name="menu" id="menu" class="form-check-input">
                                <label for="menu">Show in Menu</label>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="featured" name="featured" {{ $targetCategory->featured == 1 ? 'checked' : '' }}>
                                <span class="custom-control-label">Featured Category</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="menu" name="menu" {{ $targetCategory->menu == 1 ? 'checked' : '' }}>
                                <span class="custom-control-label">Show in Menu</span>
                            </label>
                        </div>

                        <div class="form-group">
                            @if ($targetCategory->image != null)
                                <figure class="mt-2" style="width: 512px; height: auto;">
                                    <img src="{{ asset('storage/' . $targetCategory->image) }}" class="img-fluid">
                                </figure>
                            @endif
                            <label for="image">Category Image</label>
                            <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>


                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Update Category</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
