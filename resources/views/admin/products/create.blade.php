@extends('admin.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('backend/plugins/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/dist/summernote-bs4.css') }}">
@endsection

@section('content')
<div class="container-fluid">

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-shopping-bag bg-info"></i>
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
                        <a href="#general" class="nav-link active" id="general-tab" data-toggle="tab" role="tab" aria-controls="general" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                        <a href="#images" class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="true">Images</a>
                    </li>
                    <li class="nav-item">
                        <a href="#attributes" class="nav-link" id="attributes-tab" data-toggle="tab" role="tab" aria-controls="attributes" aria-selected="true">Attributes</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="d-block w-100">Product Information</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.store') }}" method="POST" role="form" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group">
                                  <label for="name">Product Name</label>
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter product name" value="{{ old('name') }}">
                                  @error('name')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>

                              <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" placeholder="Enter product sku" value="{{ old('sku') }}">
                                @error('sku')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>
                              
                              <div class="form-group">
                                <label for="brand">Brand</label>
                                <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                  <option value="">Select Brand</option>
                                  @foreach ($brands as $brand)
                                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                  @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="categories">Categories</label>
                                <select name="categories[]" id="categories" class="form-control" multiple>
                                  <option value="">Select categories</option>
                                  @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                                @error('categories')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="price">Price (Rp)</label>
                                <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter product price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="sale_price">sale Price (Rp)</label>
                                <input type="number" min="0" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" placeholder="Enter product sale price" value="{{ old('sale_price') }}">
                                @error('sale_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Enter product quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text" min="0" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="Enter product weight" value="{{ old('weight') }}">
                                @error('weight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="10" class="form-control"></textarea>
                              </div>

                              <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status">
                                    <span class="custom-control-label">Status</span>
                                </label>
                              </div>

                              <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="featured" name="featured">
                                    <span class="custom-control-label">Featured</span>
                                </label>
                              </div>

                              <div class="mt-3">
                                  <button type="submit" class="btn btn-success">Save Product</button>
                                  <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                              </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="images" role="tabpanel" aria-labelledby="images-tab">
                    bagian 2
                </div>
                <div class="tab-pane" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">
                    bagian 3
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
  <script type="text/javascript" src="{{ asset('backend/plugins/select2/dist/js/select2.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('#categories').select2();
    });
  </script>

  <script src="{{ asset('backend/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('#description').summernote({
        tabsize: 2,
        height: 250,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    });
  </script>
@endpush