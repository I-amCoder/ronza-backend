<script>
    let field1 = (type, counter) => {
        var label = (type=="size"?"Size Number/Code": "Color Name");
        var name = (type=="size"?"number": "color");
        return `
        <div class="col-auto mb-2">
            <label class="form-label">${label}</label>
                <input name="${type}[${counter}][${name}]" required placeholder="${type=="size"?"Size":"Color"}" type="text" class="form-control">
            </div>`;
    }

    let field2 = (type, counter) => `<div class="col-auto mb-2">
        <label class="form-label">Quantity available</label>
                        <input type="number" step="any"  required name="${type}[${counter}][qty]" placeholder="Quantites Available" class="form-control">
                    </div>`;
    let field3 = (type, counter) => ` <div class="col-auto mb-2" >
        <label class="form-label">Extra on this size</label>
                <input type="number" required name="${type}[${counter}][price]" placeholder="Extra price on this ${type}" class="form-control">
            </div>`;


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
                $("#show_in_frontend_title").text('Yes')
                $("#show_in_frontend_title").removeClass('badge-danger')
                $("#show_in_frontend_title").addClass('badge-success')
            } else {
                $("#show_in_frontend_title").text('No')
                $("#show_in_frontend_title").removeClass('badge-success')
                $("#show_in_frontend_title").addClass('badge-danger')
            }
        });

        $('#customSwitch2').change(function() {
            if ($(this).is(':checked')) {
                $("#is_featured_title").text('Yes')
                $("#is_featured_title").removeClass('badge-danger')
                $("#is_featured_title").addClass('badge-success')
            } else {
                $("#is_featured_title").text('No')
                $("#is_featured_title").removeClass('badge-success')
                $("#is_featured_title").addClass('badge-danger')
            }
        });
        $('#customSwitch3').change(function() {
            if ($(this).is(':checked')) {
                $("#is_special_title").text('Yes')
                $("#is_special_title").removeClass('badge-danger')
                $("#is_special_title").addClass('badge-success')
            } else {
                $("#is_special_title").text('No')
                $("#is_special_title").removeClass('badge-success')
                $("#is_special_title").addClass('badge-danger')
            }
        });

        $(".addSizeBtn").click(function(e) {
            e.preventDefault();
            let counter = $(this).data('current-sizes');
            let container = $("#sizeContainer");
            appendForm('size', container, counter);
            $(this).data('current-sizes', parseInt(counter) + 1);
        });

        $(".addColorBtn").click(function(e) {
            e.preventDefault();
            let counter = $(this).data('current-colors');
            let container = $("#colorContainer");
            appendForm('color', container, counter);
            $(this).data('current-colors', parseInt(counter) + 1);
        });

        $(document).on('click', '.deleteRowButton', function() {
            let rowId = $(this).data('row-id');
            $("#" + rowId).remove();
        });




        function appendForm(type, container, counter) {
            $(container).append(
                `<div class="row mb-3" id="${type}-box${counter}">` + field1(type, counter) + (type ==
                    "size" ? field2(type, counter) +
                    field3(type, counter, ) : "") +
                `
                <div class="col-auto">
                <button type="button" data-row-id="${type}-box${counter}" class="deleteRowButton  btn btn-danger float-right"><i class="fa fa-trash"></i></button>
            </div>
                </div>`);
        }

        @if (isset($images))
            let preloaded = @json($images);
        @else
            let preloaded = [];
        @endif

        $('.input-images').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old_photos',
            maxFiles: 6
        });

        $(document).on('input', 'input[name="images[]"]', function() {
            var fileUpload = $("input[type='file']");
            if (parseInt(fileUpload.get(0).files.length) > 6) {
                $('#errorModal').modal('show');
            }
        });

        $("#addImage").click(function(e) {
            e.preventDefault();
            let count = parseInt($(this).data('count')) + 1;
            $($(this)).data('count', count);
            $("#images-container").append(`<div class="col-md-6 col-xl-4 mb-4">
    <label class="form-control-label" for="pimage${count}">Additional Image</label>
    <div class="text-center">
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px;">
            </div>
            <div>
                <span class="btn btn-outline-secondary btn-file">
                    <span class="fileinput-new">{{ __('Select image') }}</span>
                    <span class="fileinput-exists">{{ __('Change') }}</span>
                    <input id="pimage${count}" type="file" name="pimage[${count}][file]" accept="image/x-png,image/gif,image/jpeg">
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
