<div class="row" id="images-container">
    <div class="col-12 mb-4">
        <h4>Product Images</h4>
    </div>
    <div class="col-12">
        <label class="form-control-label" for="input-name">Main Image</label>
        <div class="text-center">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px;">
                    @isset($mainImage)
                        <img src="{{ $mainImage }}" alt="product-image">
                    @endisset
                </div>
                <div>
                    <span class="btn btn-outline-secondary btn-file">
                        <span class="fileinput-new">{{ __('Select image') }}</span>
                        <span class="fileinput-exists">{{ __('Change') }}</span>
                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                    </span>
                    <a href="#" class="btn btn-outline-secondary fileinput-exists"
                        data-dismiss="fileinput">{{ __('Remove') }}</a>
                </div>
            </div>
        </div>
        @if ($errors->has('image'))
            <span class="text-danger"><strong>{{ $errors->first('image') }}</strong></span>
        @endif
        <hr>
    </div>
    @isset($p_images)
        @foreach ($p_images as $image)
            <div data-count="{{ $loop->index }}" class="col-md-6 col-xl-4 mb-4">
                <label class="form-control-label" for="pimage{{ $loop->index }}">Additional Image</label>
                <div class="text-center">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px;">
                            <img src="{{ $image->path }}" alt="product-image{{ $loop->index }}">
                        </div>
                        <div>
                            <span class="btn btn-outline-secondary btn-file">
                                <span class="fileinput-new">{{ __('Select image') }}</span>
                                <span class="fileinput-exists">{{ __('Change') }}</span>
                                <input type="hidden" value="{{ $image->id }}" name="pimage[{{ $loop->index }}][id]">
                                <input id="pimage{{ $loop->index }}" type="file"
                                    name="pimage[{{ $loop->index }}][file]" accept="image/x-png,image/gif,image/jpeg">
                            </span>
                            {{-- <button type="button" data-row="{{ $loop->index }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> --}}
                            <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                data-dismiss="fileinput">{{ __('Remove') }}</a>
                        </div>
                    </div>
                </div>
                @if ($errors->has('image[]'))
                    <span class="text-danger"><strong>{{ $errors->first('image') }}</strong></span>
                @endif
            </div>
        @endforeach
    @endisset
</div>
<div class="row">
    <div class="col-12">
        <button id="addImage" data-count="{{ isset($p_images) ? $p_images->count() : 0 }}" class="btn btn-success">Add
            More Images</button>
    </div>
</div>
