@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Manage Products</h2>
                <a href="{{ route('products.create') }}" class="btn btn-success">Add Item</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
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
                                            <td>{{ $product->title }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->base_price }}</td>
                                            <td>{{ $product->discount }}{{ $product->discount_type == 'percentage' ? '%' : 'USD' }}
                                            </td>
                                            <td>
                                                <span data-p_id="{{ $product->id }}" data-qty="{{ $product->qty }}" style="cursor: pointer" class="updateStock">
                                                    {{ $product->qty }} <i class="fa fa-plus text-danger "></i>
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
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

    <!-- Modal -->
    <div class="modal fade" id="updateStockModal" tabindex="-1" role="dialog" aria-labelledby="updateStockModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateStockModalTitle">Update available stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('product.stock.update') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="hidden" name="p_id">
                                <input type="number" class="form-control @error('quantity') is-invliad @enderror"
                                    name="quantity" required>
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        });
    </script>
@endpush
