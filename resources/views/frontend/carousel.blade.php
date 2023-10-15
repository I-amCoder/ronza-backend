@extends('layouts.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('carousel', 'active')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Manage Main Carousel</h1>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <button class="addCarousel btn btn-primary">Add New</button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Product</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($carousels as $carousel)
                                        <tr>
                                            <td>{{ $carousel->product->title }}</td>
                                            <td>{{ $carousel->title }}</td>
                                            <td>{{ $carousel->subtitle }}</td>
                                            <td>
                                                <form action="{{ route('site.carousel.delete', $carousel->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" data-title="{{ $carousel->title }}"
                                                        data-subtitle="{{ $carousel->title }}"
                                                        data-product="{{ $carousel->product_id }}"
                                                        data-carousel="{{ encrypt($carousel->id) }}"
                                                        data-status="{{ $carousel->status }}"
                                                        class="btn btn-sm btn-warning editCarousel"><i
                                                            class="fa fa-edit"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
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
    </div>


    {{-- Modals --}}
    <!-- Add Carousel Modal-->
    <div class="modal fade" id="AddCarouselModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Carousel</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('site.carousel.store') }}" enctype="multipart/form-data" id="add-carousel-from" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <input type="hidden" name="carousel_id">



                                <label for="title" class="form-label">Carousel Heading</label>
                                <textarea class="form-control wysiwyg" name="title" placeholder="Carousel Heading"></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="title" class="form-label">Carousel Title</label>
                                <textarea class="form-control wysiwyg" name="title" placeholder="Carousel title..."></textarea>
                            </div>

                            <div class="col-md-4 mb-3 ">
                                <label for="title" class="form-label">Carousel SubTitle</label>
                                <textarea class="form-control wysiwyg" name="subtitle" placeholder="Carousel subtitle..."></textarea>
                            </div>
                            <div class="col-md-4 mb-3 ">
                                <label for="title" class="form-label">URL To Product (Optional)</label>
                                <input type="text" class="form-control" name="url" placeholder="Carousel subtitle...">
                            </div>
                            <div class="col-auto">
                                <label class="form-control-label" for="input-name">Image Banner</label>
                                <div class="text-center">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                            style="width: 200px;">
                                            <img src="/images/placeholder.jpg" id="editImage" alt="edit Image">
                                        </div>
                                        <div>
                                            <span class="btn btn-outline-secondary btn-file">
                                                <span class="fileinput-new">{{ __('Select image') }}</span>
                                                <span class="fileinput-exists">{{ __('Change') }}</span>


                                                <input type="file" name="image"
                                                    accept="image/x-png,image/gif,image/jpeg">
                                            </span>
                                            <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                                data-dismiss="fileinput">{{ __('Remove') }}</a>
                                        </div>
                                    </div>


                                </div>
                                @if ($errors->has('image'))
                                    <span class="text-danger"><strong>{{ $errors->first('image') }}</strong></span>
                                @endif

                            </div>

                            <div class="col-auto">
                                <input type="hidden" name="carousel_id">
                                <label for="title" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="2">Disabled</option>

                                </select>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary"
                        onclick="document.getElementById('add-carousel-from').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.editCarousel').click(function() {
                $("input[name='carousel_id']").val($(this).data('carousel'));
                $("select[name='product']").val($(this).data('product'));
                $("input[name='title']").val($(this).data('title'));
                $("input[name='subtitle']").val($(this).data('subtitle'));
                $("select[name='status']").val($(this).data('status'));
                $("#AddCarouselModal").modal('show');
            });

            $('.addCarousel').click(function() {
                $("select[name='product']").val();
                $("input[name='title']").val();
                $("input[name='subtitle']").val();
                $("#AddCarouselModal").modal('show');
            });

            $('.wysiwyg').summernote({
                height: 100, //set editable area's height
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', ]],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],

                ]
            });
        });
    </script>
@endpush
