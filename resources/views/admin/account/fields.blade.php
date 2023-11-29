@csrf
<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Name *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="text" value="{{ $data->name ?? '' }}" class="form-control col-9 @error('email') is-invalid @enderror" placeholder="Name" name="name" />
        </div>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Email *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="email" value="{{ $data->email ?? '' }}" class="form-control col-9" placeholder="Email" name="email" />
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Password *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="password" class="form-control col-9" placeholder="Password" name="password" />
        </div>
    </div>
</div>
{{--
<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Avatar *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url('{{ ( isset($data->avatar_url) && $data->avatar_url != NULL ? asset('storage/' .$data->avatar_url) : asset('user.svg')) }}')">
            <div class="image-input-wrapper"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="file" accept=".png, .jpg, .jpeg">
                <input type="hidden" name="profile_avatar_remove">
            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
    </div>
</div>

<hr>

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Phone *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="text" value="{{ $data->phone ?? '' }}" class="form-control col-9" placeholder="Phone number" name="phone" />
        </div>
    </div>
</div> --}}

@push('page_style')
<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
<script src="{{ asset('js/pages/custom/user/edit-user.js') }}"></script>
<script src="{{ asset('js/pages/crud/forms/validation/form-widgets.js') }}"></script>
<script>
    var KTSelect2 = function() {

        var demos = function() {

            $('#kt_select2_1').select2({
                placeholder: "Select a tag"
            });

            $('#kt_select2_2').select2({
                placeholder: "Select a state"
            });

            $('#kt_select2_3').select2({
                placeholder: "Select a tag",
            });
            $('#kt_select2_101').select2({
                placeholder: "Select a content",
            });
            $('#kt_select2_102').select2({
                placeholder: "Choose category",
            });

            $('#kt_select2_4').select2({
                placeholder: "Select a lecture",
                allowClear: true
            });
        };


        return {
            init: function() {
                demos();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTSelect2.init();
    });
</script>
@endpush