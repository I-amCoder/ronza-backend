<div class="row">
    <div class="col-12">
        <h4 class="text-dark">Product Meta Data</h4>
    </div>
    <div class="col-md-4 mb-4">
        <label for="meta_title" class="form-label">Meta Title</label>
        <input value="{{ $meta_title ?? old('meta_title') }}" type="text" name="meta_title" id="meta_title"
            placeholder="Product meta title" class="form-control @error('meta_title') is-invalid @enderror">
        @error('meta_title')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
    <div class="col-md-8 mb-4">
        <label for="meta_keywords" class="form-label">Meta Keywords</label>
        <input value="{{ $meta_keywords ?? old('meta_keywords') }}" type="text" name="meta_keywords" id="meta_keywords"
            placeholder="Comma seprated" class="form-control @error('meta_keywords') is-invalid @enderror">
        @error('meta_keywords')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
    <div class="col-12">
        <label for="meta_description" class="form-label">Meta Description</label>
        <input value="{{ $meta_description ?? old('meta_description') }}" type="text" name="meta_description" id="meta_description"
            placeholder="Product meta description" class="form-control @error('meta_description') is-invalid @enderror">
        @error('meta_description')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    </div>
</div>
