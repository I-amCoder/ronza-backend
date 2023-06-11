<div class="row" id="images-container">
    <div class="col-12 mb-4">
        <h4>Product Images</h4>
    </div>
    <div class="col-12">
        <label class="form-control-label" for="input-name">Main Image</label>
        <div class="text-center">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px;">
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

</div>
<div class="row">
    <div class="col-12">
        <button id="addImage" data-count="0" class="btn btn-success">Add More Images</button>
    </div>
</div>
