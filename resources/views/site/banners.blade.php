@extends('layouts.app')
@section('title', 'Site Banners')
@section('content')
    <div class="container-fluid">
        <form action="{{ route('site.banners.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4>Top Banners</h4>
            <div class="row text-center">
                <div class="col-md-6">
                    @include('utils.image_uploader', [
                        'label' => 'Top Banner 1',
                        'name' => 'top_banner_1',
                        'src' => $banners->image_path('top_banner_1') ?? null,
                    ])
                </div>
                <div class="col-md-6">
                    @include('utils.image_uploader', [
                        'label' => 'Top Banner 2',
                        'name' => 'top_banner_2',
                        'src' => $banners->image_path('top_banner_2') ?? null,
                    ])
                </div>
            </div>
            <hr>
            <h4>Middle Banners</h4>
            <div class="row text-center">
                <div class="col-md-4">
                    @include('utils.image_uploader', [
                        'label' => 'Middle Banner 1',
                        'name' => 'middle_banner_1',
                        'src' => $banners->image_path('middle_banner_1') ?? null,
                    ])
                </div>
                <div class="col-md-4">
                    @include('utils.image_uploader', [
                        'label' => 'Middle Banner 2',
                        'name' => 'middle_banner_2',
                        'src' => $banners->image_path('middle_banner_2') ?? null,
                    ])
                </div>
                <div class="col-md-4">
                    @include('utils.image_uploader', [
                        'label' => 'Middle Banner 3',
                        'name' => 'middle_banner_3',
                        'src' => $banners->image_path('middle_banner_3') ?? null,
                    ])
                </div>
            </div>
            <hr>
            <h4>Bottom Banner</h4>
            <div class="row text-center">
                <div class="col-md-12">
                    @include('utils.image_uploader', [
                        'label' => 'Bottom Banner',
                        'name' => 'bottom_banner_1',
                        'src' => $banners->image_path('bottom_banner_1') ?? null,
                    ])
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <button type="submit" class="btn btn-success float-right">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
