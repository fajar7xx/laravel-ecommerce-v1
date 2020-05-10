@extends('admin.app')

@section('title')
    {{ $pageTitle }}
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('backend/plugins/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/dist/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/dropzone/dropzone.min.css') }}">
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
                {{-- product edit --}}
                <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="d-block w-100">Product Information</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" role="form" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                            
                              <input type="hidden" name="product_id" value="{{ $product->id }}">
                              <div class="form-group">
                                  <label for="name">Product Name</label>
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter product name" value="{{ old('name', $product->name) }}">
                                  @error('name')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>

                              <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" placeholder="Enter product sku" value="{{ old('sku', $product->sku) }}">
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
                                    @if ($product->brand_id ==$brand->id)
                                        <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                    @else
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endif
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
                                    @php
                                        $check = in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'selected' : ''
                                    @endphp
                                      <option value="{{ $category->id }}" {{ $check }}>{{ $category->name }}</option>
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
                                <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter product price" value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="sale_price">Special Price (Rp)</label>
                                <input type="number" min="0" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" placeholder="Enter product special price" value="{{ old('sale_price', $product->sale_price) }}">
                                @error('sale_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" min="0" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Enter product quantity" value="{{ old('quantity', $product->quantity) }}">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text" min="0" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="Enter product weight" value="{{ old('weight', $product->weight) }}">
                                @error('weight')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="10" class="form-control">{!! old('description', $product->description) !!}</textarea>
                              </div>

                              <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $product->status == 1 ? 'checked':'' }}>
                                    <span class="custom-control-label">Status</span>
                                </label>
                              </div>

                              <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="featured" name="featured" {{ $product->featured == 1 ? 'checked':'' }}>
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
                {{-- image edit --}}
                <div class="tab-pane" id="images" role="tabpanel" aria-labelledby="images-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="d-block w-100">Add Images</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0, 0, 0, 0.3)" enctype="multipart/form-data">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <div class="row d-print-none mt-2">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-success" type="button" id="uploadButton">
                                        Upload Images
                                    </button>
                                </div>
                            </div>
                            @if ($product->images)
                                <hr>
                                <div class="row">
                                    @foreach ($product->images as $image)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <img src="{{ asset('storage/' . $image->full) }}" id="brandLogo" class="card-img-top" alt="img">
                                                <div class="card-body">
                                                    <form action="{{ route('admin.products.images.delete', $image->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm mt-4 float-right"><i class="ik ik-trash"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>        
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="attributes" role="tabpanel" aria-labelledby="attributes-tab">
                    <product-attributes :productid="{{ $product->id }}"></product-attributes>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('backend/plugins/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('#categories').select2();
    });
  </script>
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
  <script>
      Dropzone.autoDiscover = false;

      $(document).ready(function(){

          let myDropzone = new Dropzone('#dropzone', {
              paramName: "image",
              addRemoveLink: false,
              maxFileSize: 4,
              parallelUploads: 2,
              uploadMultiple: false,
              url: "{{ route('admin.products.images.upload') }}",
              autoProcessQueue: false,
          });
          myDropzone.on("queuecomplete", function(file){
            window.location.reload();
            showNotification('Complete', 'All product images uploaded', 'success', 'fa-check');
          });
          $('#uploadButton').click(function(){
              if(myDropzone.files.length === 0){
                  showNotification('Error', 'please select file to upload', 'danger', 'fa-close');
              }else{
                  myDropzone.processQueue();
              }
          });
          function showNotification(title, message, type, icon)
          {
              $.notify({
                  title: title + ' : ',
                  message: message,
                  icon: 'fa ' + icon
              },
              {
                  type: type,
                  allow_dismiss: true,
                  placement: {
                      from: "top",
                      align: "right"
                  },
              });
          }
      });
  </script>
@endpush