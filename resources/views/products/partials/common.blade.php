<div class="row">
    <div class="col-md-6 col-xl-4  mb-3">
        <label for="title" class="form-label">Title</label>
        <input value="{{ $title ?? old('title') }}" type="text" name="title" id="title"
            placeholder="Product Title..." class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-xl-4 mb-3">
        <label for="category" class="form-label">Prodct Cateogry</label>
        <select class="form-control" name="category" id="category">
            <option value>Uncategorized</option>
            @foreach ($categories as $category)
                <option {{ isset($p_category) && $p_category == $category->id ? 'selected' : '' }}
                    value="{{ encrypt($category->id) }}">{{ $category->name }}</option>
            @endforeach
        </select>

        @error('title')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-xl-4 mb-3">
        <label for="model" class="form-label">Model</label>
        <input value="{{ $model ?? old('model') }}" type="text" name="model" id="model"
            placeholder="Product Model" class="form-control @error('model') is-invalid @enderror">
        @error('model')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-xl-4 mb-3">
        <label for="sku" class="form-label">SKU</label>
        <div class="input-group mb-3">
            <input value="{{ $sku ?? old('price') }}" type="text" name="sku" id="sku"
                placeholder="Product Sku" class="form-control @error('sku') is-invalid @enderror" aria-label="Username">
        </div>
        @error('sku')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-xl-4 mb-3">
        <label for="base_price" class="form-label">Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="price-addon">$</span>
            <input value="{{ $base_price ?? old('price') }}" type="number" name="base_price" id="base_price"
                placeholder="Product Price..." class="form-control @error('base_price') is-invalid @enderror"
                aria-label="Username" aria-describedby="price-addon">
        </div>
        @error('base_price')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-xl-4 mb-3">
        <label for="discount" class="form-label">Discount (If any)</label>
        <div class="input-group-append mb-3">
            <input style="border-radius: 5px 0px 0px 5px" value="{{ $discount ?? old('discount') }}" type="number"
                step="any" name="discount" id="discount" placeholder="Product Discount..."
                class="form-control @error('discount') is-invalid @enderror" aria-label="Username">
            <div class="input-group-append ">
                <select name="type" id="type" class="form-control" style="border-radius: 0 5px 5px 0">
                    <option {{ (isset($discount_type) && $discount_type) == 'percentage' ? 'selected' : '' }}
                        value="percentage">Percentage</option>
                    <option {{ (isset($discount_type) && $discount_type) == 'fixed' ? 'selected' : '' }} value="fixed">
                        Fixed</option>
                </select>
            </div>


        </div>
        @error('discount_price')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6 col-xl-4 mb-3">
        <label for="quantity" class="form-label">Quantity (Stock)</label>
        <div class="input-group mb-3">
            <input value="{{ $quantity ?? old('quantity') }}" type="number" name="quantity" id="quantity"
                placeholder="Product Available Stock" class="form-control @error('quantity') is-invalid @enderror">
        </div>
        @error('quantity')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


</div>

<div class="row">
    <div class="col-12 mb-3">
        <label for="title" class="form-label">Show in frontend</label>
        <div class="custom-control custom-switch">
            <input {{ isset($show_in_frontend) && $show_in_frontend == 1 ? 'checked' : '' }} name="show_in_frontend"
                type="checkbox" class="custom-control-input " id="customSwitch1">
            <label id="show_in_frontend_title"
                class="custom-control-label badge p-2 badge-{{ isset($show_in_frontend) && $show_in_frontend == 1 ? 'success' : 'danger' }}"
                for="customSwitch1">{{ isset($show_in_frontend) && $show_in_frontend == 1 ? 'Yes' : 'No' }}</label>
        </div>
        @error('show_in_frontend')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label for="title" class="form-label">Is Featured</label>
        <div class="custom-control custom-switch">
            <input {{ isset($is_featured) && $is_featured == 1 ? 'checked' : '' }} name="is_featured" type="checkbox"
                class="custom-control-input" id="customSwitch2">
            <label id="is_featured_title"
                class="custom-control-label p-2 badge badge-{{ isset($is_featured) && $is_featured == 1 ? 'success' : 'danger' }}"
                for="customSwitch2">{{ isset($is_featured) && $is_featured == 1 ? 'Yes' : 'No' }}</label>
        </div>
        @error('is_featured')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label for="title" class="form-label">Is Special</label>
        <div class="custom-control custom-switch">
            <input {{ isset($is_special) && $is_special == 1 ? 'checked' : '' }} name="is_special" type="checkbox"
                class="custom-control-input" id="customSwitch3">
            <label id="is_special_title"
                class="custom-control-label badge p-2 badge-{{ isset($is_special) && $is_special == 1 ? 'success' : 'danger' }}"
                for="customSwitch3">{{ isset($is_special) && $is_special == 1 ? 'Yes' : 'No' }}</label>
        </div>
        @error('is_special')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
