<label class="form-control-label" for="input-name">{{ $label ?? '' }}</label>
<div>

    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="">
            <img src="{{ $src ?? asset('images/placeholder.jpg') }}" alt="Image">
        </div>
        <div>
            <span class="btn btn-outline-secondary btn-file">
                <span class="fileinput-new">{{ __('Select image') }}</span>
                <span class="fileinput-exists">{{ __('Change') }}</span>


                <input type="file" name="{{ $name }}" accept="image/x-png,image/gif,image/jpeg">
            </span>
            <a href="#" class="btn btn-outline-secondary fileinput-exists"
                data-dismiss="fileinput">{{ __('Remove') }}</a>
        </div>
    </div>



</div>
@if ($errors->has($name))
    <span class="text-danger"><strong>{{ $errors->first($name) }}</strong></span>
@endif
