<div class="form-group row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <label>{{ trans('admin.panel.name') }} *</label>
        <input type="text" class="form-control"
            placeholder="{{ trans('admin.general.add') }} {{ trans('admin.panel.name') }}" name="name" id="name" onkeyup="slugChange(this.value)"
            value="{{ $data->name ?? '' }}" />
        <span class="form-text text-muted"></span>
    </div>
</div>

@push('page_style')
<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
<script src="{{ asset('js/pages/custom/user/edit-user.js') }}"></script>
<script src="{{ asset('js/pages/crud/forms/validation/form-widgets.js') }}"></script>
<script src="{{ asset('js/pages/crud/forms/editors/summernote.js') }}"></script>
<script>
    function formSubmit() {
		document.getElementById("kt_form").submit();
	}
</script>
@endpush