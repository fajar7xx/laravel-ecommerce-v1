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

    @include('admin.partials.flash')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-block w-100">Data Table</h3>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right">
                        <i class="ik ik-plus"></i>
                        Add Products
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="table-pproducts" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Name</th>
                                <th class="text-center">Brand</th>
                                <th class="text-center">Categories</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center text-danger" style="width:100px; min-width:100px"> <i class="ik ik-alert-circle"></i> </th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($products as $product)
                               <tr>
                                   <td>{{ $product->id }}</td>
                                   <td>{{ $product->sku }}</td>
                                   <td>{{ $product->name }}</td>
                                   <td>{{ $product->brand->name }}</td>
                                   <td>
                                       @foreach ($product->categories as $category)
                                           <span class="badge badge-info">{{ $category->name }}</span>
                                       @endforeach
                                   </td>
                                   <td>
                                       Rp. {{ $product->price }}
                                   </td>
                                   <td class="text-center">
                                       @if ($product->status == 1)
                                           <span class="badge badge-success">Active</span>
                                       @else
                                       <span class="badge badge-danger">Not active</span>
                                       @endif
                                   </td>
                                   <td class="text-center">
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                                        <div class="btn-group" role="group" aria-label="Actions">

                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-info">
                                                <i class="ik ik-edit"></i>
                                                Edit
                                            </a>

                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="ik ik-trash"></i> Delete</button>
                                        </div>
                                    </form>
                                   </td>
                               </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#table-products').DataTable();
    });
</script>
@endpush