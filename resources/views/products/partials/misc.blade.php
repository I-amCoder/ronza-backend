<h4>Product Specifications</h4>
<div class="row mt-4">
    <div class="col-md-12" id="sizeContainer">
        <div class="mb-4">
            <button type="button" data-current-sizes="{{ isset($product) ? $product->sizes->count() : 0 }}"
                class="btn btn-success float-right addSizeBtn"><i class="fa fa-plus"></i> Add Size</button>
            <h5>Product Sizes</h5>
        </div>
        @isset($product)
            @foreach ($product->sizes as $size)
                <div class="row mb-3" id="size-box{{ $loop->index }}">
                    <div class="col-auto mb-2">
                        <label class="form-label">Size</label>
                        <input type="hidden" name="old_size[{{ $loop->index }}][size_id]" value="{{ $size->id }}">
                        <input name="old_size[{{ $loop->index }}][size]" required value="{{ $size->size }}"
                            type="text" class="form-control">
                    </div>

                    <div class="col-auto mb-2">
                        <label class="form-label">Quantity available</label>
                        <input type="number" step="any" required name="old_size[{{ $loop->index }}][qty]"
                            value="{{ $size->qty }}" class="form-control">
                    </div>


                    <div class="col-auto mb-2">
                        <label class="form-label">Extra on this size</label>
                        <input type="number" required name="old_size[{{ $loop->index }}][price]"
                            value="{{ $size->extra_price }}" class="form-control">
                    </div>

                    <div class="col-auto">
                        <button type="button" data-row-id="size-box{{ $loop->index }}"
                            class="deleteRowButton  btn btn-danger float-right"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
    <div class="col-12">
        <hr>
    </div>
    <div class="col-md-12" id="colorContainer">
        <div class="mb-4">
            <button type="button" data-current-colors="{{ isset($product) ? $product->colors->count() : 0 }}"
                class="btn btn-success float-right addColorBtn"><i class="fa fa-plus"></i> Add Color</button>
            <h5>Product Colors</h5>
        </div>
        @isset($product)

            @foreach ($product->colors as $color)
                <div class="row mb-3" id="color-box{{ $loop->index }}">
                    <div class="col-auto mb-2">
                        <label class="form-label">Color Name</label>
                        <input type="hidden" name="old_color[{{ $loop->index }}][color_id]"
                            value="{{ $color->id }}">
                        <input name="old_color[{{ $loop->index }}][color]" required value="{{ $color->name }}"
                            type="text" class="form-control">
                    </div>
                    <div class="col-auto">
                        <button type="button" data-row-id="color-box{{ $loop->index }}"
                            class="deleteRowButton  btn btn-danger float-right"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            @endforeach
        @endisset
    </div>
</div>
