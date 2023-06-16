@extends('layouts.app')
@section('categories', 'active')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4>Manage Categories</h4>
                <hr>
                <button class="btn btn-success" data-toggle="modal" data-target="#AddCategoryModal">Add New
                    Category</button>
            </div>
        </div>
        <div class="row">

            <div class="col-12 mt-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th></th>
                            <th>Name</th>

                            <th>Title</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>
                                        <img src="{{ $category->logo_path }}" alt="{{ $category->name }}"
                                            class="img-table-sm">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>
                                        <form class="row"  action="{{ route('category.destroy',$category->id) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                                <a  href="javascript::void(0)"  data-name="{{ $category->name }}" data-title="{{ $category->title }}"
                                                    data-logo="{{ $category->logo_path }}" data-id="{{ encrypt($category->id) }}"
                                                    class="mx-2 btn btn-sm btn-warning editCategory"><i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Additional Modals --}}
    @include('category.partials.create')
    @include('category.partials.edit')
@endsection
@push('js')
    <script>
        $('.editCategory').click(function() {
            $("#editCatName").val($(this).data('name'));
            $("#editCatTitle").val($(this).data('title'));
            $("#editImage").attr('src', $(this).data('logo'));
            let id = $(this).data('id');
            $("#edit-category-from").attr('action', "{{ url('category') }}/" + id);
            $("#editCategoryModal").modal('show');
        });
    </script>
@endpush
