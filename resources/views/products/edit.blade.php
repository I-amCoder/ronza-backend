@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                                's_description' => $product->small_description,
                                'price' => $product->price,
                                'd_price' => $product->discounted_price,
                                'status' => $product->status,
                                'p_category' => $product->category_id,
                            ])
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
    @include('site.partials.js')
@endpush
