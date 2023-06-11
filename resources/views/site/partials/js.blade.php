<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200, //set editable area's height
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        $('#customSwitch1').change(function() {
            if ($(this).is(':checked')) {
                $("#status_title").text('Active')
                $("#status_title").removeClass('badge-danger')
                $("#status_title").addClass('badge-success')
            } else {
                $("#status_title").text('Inactive')
                $("#status_title").removeClass('badge-success')
                $("#status_title").addClass('badge-danger')
            }
        });
        $("#addImage").click(function(e) {
            e.preventDefault();
            let count = parseInt($(this).data('count'))+1;
            $($(this)).data('count', count);
            $("#images-container").append(`<div class="col-md-6 col-xl-4 mb-4">
    <label class="form-control-label" for="pimage${count}">Product Image ${count}</label>
    <div class="text-center">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px;">
            </div>
            <div>
                <span class="btn btn-outline-secondary btn-file">
                    <span class="fileinput-new">{{ __('Select image') }}</span>
                    <span class="fileinput-exists">{{ __('Change') }}</span>
                    <input id="pimage${count}" type="file" name="pimage[]" accept="image/x-png,image/gif,image/jpeg">
                </span>
                <a href="#" class="btn btn-outline-secondary fileinput-exists"
                    data-dismiss="fileinput">{{ __('Remove') }}</a>
            </div>
        </div>
    </div>
    @if ($errors->has('image[]'))
        <span class="text-danger"><strong>{{ $errors->first('image') }}</strong></span>
    @endif
</div>`);

        });
    });
</script>
