@extends('layouts.app')
@section('title', 'Manage Products')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a href="{{ route('products.create') }}" class="btn btn-success">Add Item</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discounted</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                <img class="img-table-sm" src="{{ $product->imagePath }}"
                                                    alt="{{ $product->title }}">
                                            </td>
                                            <td  data-toggle="tooltip" title="{{ $product->title }}" class="title-truncate">{{ $product->title }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->base_price }}</td>
                                            <td>{{ $product->discount }}{{ $product->discount_type == 'percentage' ? '%' : 'USD' }}
                                            </td>
                                            <td>
                                                <span data-toggle="tooltip" title="Change" data-p_id="{{ $product->id }}" data-qty="{{ $product->qty }}" style="cursor: pointer" class="updateStock">
                                                    {{ $product->qty }} <i class="fa fa-edit text-danger "></i>
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a data-toggle="tooltip" title="Edit"  href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button data-toggle="tooltip"  title="Clone" data-clone_id="{{ $product->id }}" data-name="{{ $product->title }}" type="button" class="btn btn-info btn-sm cloneProduct"><i class="fa fa-copy"></i></button>
                                                    <button data-toggle="tooltip" title="Delete" ="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @include('products.partials.models')
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $(".updateStock").click(function(e) {
                e.preventDefault();
                $("input[name=p_id]").val($(this).data('p_id'));
                $("input[name=quantity]").val($(this).data('qty'));
                $("#updateStockModal").modal('show');
            });

            $(".cloneProduct").click(function (e) {
                e.preventDefault();
                let modal = $("#cloneProductModal");
                $("#cloneProductModalTitle").html($(this).data('name'));
                $("input[name=clone_id]").val($(this).data('clone_id'));
                modal.modal('show');
            });
        });
    </script>
@endpush
