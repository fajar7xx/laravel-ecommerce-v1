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
                    <h3 class="d-block w-100">Data Table</h3>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary float-right">
                        <i class="ik ik-plus"></i>
                        Add Category
                    </a>
                </div>
                <div class="card-body">
                   <table class="table table-hover table-bordered" id="table-category">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Name</th>
                               <th>Slug</th>
                               <th class="text-center">Parent</th>
                               <th class="text-center">Featured</th>
                               <th class="text-center">Menu</th>
                               <th class="text-center">Order</th>
                               <th style="width: 100px; min-width:100px;" class="text-center text-danger"> <i class="ik ik-alert-circle"></i></th>
                           </tr>
                       </thead>
                       <tbody>
                           @php
                               $no=1
                           @endphp
                           @foreach ($categories as $category)
                                @if ($category->id != 1)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->parent->name }}</td>
                                        <td class="text-center">
                                            @if ($category->featured == 1)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">no</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($category->menu == 1)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{ $category->order }}
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Actions">
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-info">
                                                    <i class="ik ik-edit"></i>
                                                    edit
                                                </a>
                                                <a href="{{ route('admin.categories.destroy', $category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm(' Are you sure delete this')">
                                                    <i class="ik ik-trash"></i>
                                                    delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#table-category').DataTable();
            });
        </script>
    @endpush
