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
        <label for="s_description" class="form-label">Small Description</label>
        <input value="{{ $s_description ?? old('s_description') }}" type="text" name="s_description"
            id="s_description" placeholder="Product Small Descriotion..."
            class="form-control @error('s_description') is-invalid @enderror">
        @error('s_description')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-xl-4 mb-3">
        <label for="price" class="form-label">Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="price-addon">$</span>
            <input value="{{ $price ?? old('price') }}" type="number" name="price" id="price"
                placeholder="Product Price..." class="form-control @error('price') is-invalid @enderror"
                aria-label="Username" aria-describedby="price-addon">
        </div>
        @error('price')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-xl-4 mb-3">
        <label for="discount_price" class="form-label">Discounted Price (If any)</label>
        <div class="input-group mb-3">
            <span class="input-group-text" id="discount_price-addon">$</span>
            <input value="{{ $d_price ?? old('discount_price') }}" type="number" name="discount_price"
                id="discount_price" placeholder="Product Price..."
                class="form-control @error('discount_price') is-invalid @enderror" aria-label="Username"
                aria-describedby="discount_price-addon">
        </div>
        @error('discount_price')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6 col-xl-4 mb-3">
        <label for="title" class="form-label">Status</label>
        <div class="custom-control custom-switch">
            <input {{ isset($status) && $status == 1 ? 'checked' : '' }} name="status" type="checkbox"
                class="custom-control-input" id="customSwitch1">
            <label id="status_title"
                class="custom-control-label badge badge-{{ isset($status) && $status == 1 ? 'success' : 'danger' }}"
                for="customSwitch1">{{ isset($status) && $status == 1 ? 'Active' : 'Inactive' }}</label>
        </div>
        @error('status')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
