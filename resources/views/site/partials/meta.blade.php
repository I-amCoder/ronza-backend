<h4>Meta Data</h4>
<div class="row">
    <div class="col-12 mb-3">
        <label for="meta_title" class="from-lable">Meta Title</label>
        <input type="text" id="meta_title" name="meta_title"
            class="form-control @error('meta_title') is-invalid @enderror" placeholder="Enter Site Meta Title...."
            value="{{ $site->meta_title }}">
        @error('meta_title')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label for="meta_description" class="from-lable">Meta Description</label>
        <input type="text" id="meta_description" name="meta_description"
            class="form-control @error('meta_description') is-invalid @enderror"
            placeholder="Enter Site Meta Description...." value="{{ $site->meta_description }}">
        @error('meta_description')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label for="meta_keywords" class="from-lable">Meta Keywords</label>
        <input type="text" id="meta_keywords" name="meta_keywords"
            class="form-control @error('meta_keywords') is-invalid @enderror" placeholder="Enter Meta Keywords...."
            value="{{ $site->meta_keywords }}">
        @error('meta_keywords')
            <span role="alert" class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
