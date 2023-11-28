@push('page_style')
<link href="{{ asset('plugins/custom/uppy/uppy.bundle.css') }}" rel="stylesheet" type="text/css" />
{{--
<link rel="stylesheet" href="{{ asset('custom-form/wtf-forms.css') }}">
<link rel="stylesheet" href="{{ asset('custom-form/docs.css') }}"> --}}
@endpush

<input type="hidden" name="status" id="status" value="1">

<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="form-group">
			<label>{{ trans('admin.panel.name') }}</label>
			<input type="text" class="form-control" name="name" value="{{ $data->name }}" readonly />
		</div>
	</div>

	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
		<div class="form-group">
			<label>Company</label>
			<input type="text" class="form-control" name="company" value="{{ $data->company }}" />
		</div>
	</div>
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
		<div class="form-group">
			<label>Phone</label>
			<input type="text" class="form-control" name="phone" value="{{ $data->phone }}" />
		</div>
	</div>
</div>

<div class="row">
	@if ($data->body)
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="form-group">
			<label>Message</label>
			<textarea class="form-control" name="body" rows="4" readonly>{{ $data->body }}</textarea>
		</div>
	</div>
	@endif

	@if ($data->description)
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<p class="text-muted">
			<strong>Description :</strong>
			<br>
			{{ $data->description }}
		</p>
	</div>
	@endif
</div>