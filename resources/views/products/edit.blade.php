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
                        <h5>Edit Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('put')
                            @include('products.partials.common', [
                                'title' => $product->title,
                                'model' => $product->model,
                                'base_price' => $product->base_price,
                                'discount' => $product->discount,
                                'discount_type' => $product->discount_type,
                                'show_in_frontend' => $product->show_in_frontend,
                                'is_featured' => $product->is_featured,
                                'is_special' => $product->is_special,
                                'sku' => $product->sku,
                                'd_price' => $product->discounted_price,
                                'status' => $product->status,
                                'p_category' => $product->category_id,
                                'quantity'=>$product->qty,
                            ])
                            <hr>
                            @include('products.partials.misc',['product'=>$product])
                            <hr>
                            @include('products.partials.description', [
                                'description' => $product->description,
                            ])
                            <hr>
                            @include('products.partials.images',[
                                'mainImage'=>$product->image_path,
                                'p_images'=>$product->images
                            ])
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

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('dashboard-theme/js/image-uploader.min.js') }}"></script>
    @include('site.partials.js',['images'=>$images])
@endpush
