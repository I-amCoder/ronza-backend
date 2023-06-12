@extends('layouts.app')
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
                                                <form action="{{ route('frontend.carousel.delete',$carousel->id) }}" method="POST">
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Carousel</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('frontend.carousel.store') }}" id="add-carousel-from" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="carousel_id">
                                <label for="title" class="form-label">Carousel Name</label>
                                <select name="product" id="product" class="form-control">
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="title" class="form-label">Carousel Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Carousel title...">
                            </div>

                            <div class="col-12 mt-3">
                                <label for="title" class="form-label">Carousel SubTitle</label>
                                <input type="text" class="form-control" name="subtitle"
                                    placeholder="Carousel subtitle...">
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="carousel_id">
                                <label for="title" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="2">InActive</option>

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
    <script>
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
    </script>
@endpush
