@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard-theme/css/image-uploader.min.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Manage Products</h2>
                <a href="{{ route('products.index') }}" class="btn btn-danger">
                    <i class="fa fa-backward"></i>
                    Back
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Add New Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @include('products.partials.common')
                            <hr>
                            @include('products.partials.misc')
                            <hr>
                            @include('products.partials.description')
                            <hr>
                            @include('products.partials.images')
                            <hr>
                            @include('products.partials.meta')
                            <div class="row mt-4">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">Save </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@push('js')
    <!-- include summernote css/js -->
    <script src="{{ asset('dashboard-theme/js/image-uploader.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    @include('site.partials.js')
@endpush
