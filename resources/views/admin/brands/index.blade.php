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
                    <i class="ik ik-box bg-success"></i>
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
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary float-right">
                        <i class="ik ik-plus"></i>
                        Add Brand
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="table-brands" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th class="text-center text-danger" style="width:100px; min-width:100px"> <i class="ik ik-alert-circle"></i> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>
                                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                                            <div class="btn-group" role="group" aria-label="Actions">
    
                                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-info">
                                                    <i class="ik ik-edit"></i>
                                                    edit
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
        $('#table-brands').DataTable();
    });
</script>
@endpush