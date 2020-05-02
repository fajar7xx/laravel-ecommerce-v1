@extends('admin.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="d-block w-100">Create Brand</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.brands.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name <span class="ml-5 text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="logo">Brand logo</label>
                        <input type="file" name="logo" id="logo" class="form-control-file @error('logo') is-invalid @enderror">
                        @error('logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Save Brand</button>
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection