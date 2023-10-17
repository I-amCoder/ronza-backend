<h4>Manage Images</h4>
<div class="row">
    <div class="col-md-6 col-lg-4 text-center">
        <label class="form-control-label" for="input-name">Logo</label>
        <div class="text-center">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px;">
                    @if (!is_null($site->logo_path))
                        <img src="{{ $site->logo_path }}" alt="..." />
                    @endif
                </div>
                <div>
                    <span class="btn btn-outline-secondary btn-file">
                        <span class="fileinput-new">{{ __('Select image') }}</span>
                        <span class="fileinput-exists">{{ __('Change') }}</span>


                        <input type="file" name="logo" accept="image/x-png,image/gif,image/jpeg">
                    </span>
                    <a href="#" class="btn btn-outline-secondary fileinput-exists"
                        data-dismiss="fileinput">{{ __('Remove') }}</a>
                </div>
            </div>


        </div>
        @if ($errors->has('image'))
            <span class="text-danger"><strong>{{ $errors->first('image') }}</strong></span>
        @endif

    </div>
    <div class="col-md-6 col-lg-4 text-center">
        <label class="form-control-label" for="input-name">Main Image</label>

        <div class="text-center">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px;">
                    @if (!is_null($site->image_path))
                        <img src="{{ $site->image_path }}" alt="..." />
                    @endif
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

    </div>
</div>
