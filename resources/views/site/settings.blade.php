@extends('layouts.app')
@section('title', 'Site Settings')



@section('content')
    <div class="container-fluid">
        <form action="{{ route('site.settings.update', encrypt($site->id)) }}" class="mb-5" method="POST"
            enctype="multipart/form-data">
            @csrf
            {{-- Common Settings --}}
            @include('site.partials.common')
            <hr>
            @include('site.partials.meta')
            <hr>
            @include('site.partials.social')
            <hr>
            @include('site.partials.images')
            <hr>
            <div class="row mt-4">
                <div class="col text-center">
                    <Button class="btn btn-success" type="submit">Save</Button>
                </div>
            </div>
        </form>
    </div>
@endsection
