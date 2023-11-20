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
			<label>{{ trans('admin.panel.title') }} *</label>
			<input type="text" class="form-control" placeholder="{{ trans('admin.general.add') }} {{ trans('admin.panel.title') }}" name="title" value="{{ $data->title ?? old('title') }}" onkeyup="slugChange(this.value)" />
			<span class="form-text text-danger">
				@error('title')
				{{ $message }}
				@enderror
			</span>
		</div>
	</div>

	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="form-group">
			<label>{{ trans('admin.panel.slug') }} *</label>
			<input type="text" id="slug" class="form-control" placeholder="{{ trans('admin.general.add') }} {{ trans('admin.panel.slug') }}" name="slug" value="{{ $data->slug ?? old('slug') }}" onkeyup="slugChange(this.value)" />
			<span class="form-text text-danger">
				@error('slug')
				{{ $message }}
				@enderror
			</span>
		</div>
	</div>

	{{-- <div class="col-4">
		<div class="form-group">
			<label>File </label>
			<input type="file" onchange="document.getElementById('file-custom-label').innerHTML = this.files[0].name" style="display:none;" id="file-custom" aria-label="File browser example" name="content">
			<label for="file-custom" type="button" id="file-custom-label" class="btn btn-primary form-control" id="upload">{{ isset($data) ? $data->getFirstMediaUrl('Content') : 'Upload' }}</label>
		</div>
	</div> --}}
</div>

<div class="row">
	<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
		<div class="form-group">
			<label>{{ trans('admin.panel.content') }} *</label>
			<textarea style="height: 100%;" id="tinyMceEditor" name="body">{{ $data->body ?? old('body') }}</textarea>
			<span class="form-text text-danger">
				@error('body')
				{{ $message }}
				@enderror
			</span>
		</div>
	</div>
	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="form-group">
					<label> {{ trans('admin.panel.thumbnail') }} *</label>
					<div class="image-input image-input-empty image-input-outline" style="background-image: url({{ isset($data) ? $data->getFirstMediaUrl('Content_thumbnail') : '' }});width: 100%;" id="kt_user_edit_avatar">
						<div class="image-input-wrapper" style="height: 220px; width: 100%"></div>
						<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Cover">
							<i class="fa fa-pen icon-sm text-muted"></i>
							<input type="file" name="file" accept=".png, .jpg, .jpeg, .webp">
							<input type="hidden" name="profile_avatar_remove">
						</label>
						<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel Cover">
							<i class="ki ki-bold-close icon-xs text-muted"></i>
						</span>
						<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove Cover">
							<i class="ki ki-bold-close icon-xs text-muted"></i>
						</span>
						{{-- error message --}}
					</div>
					<span class="form-text text-danger">
						@error('file')
						{{ $message }}
						@enderror
					</span>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="form-group">
					<label>{{ trans('admin.panel.type') }} *</label>
					<select name="type" id="type" class="form-control">
						@foreach (Config::get('content-type') as $type => $value)
						<option value="{{ $type }}" {{ (isset($data) && $data->type == $type) || request()->type == $type ? 'selected' : '' }}>{{ $value }}</option>
						@endforeach
					</select>
					<span class="form-text text-danger">
						@error('type')
						{{ $message }}
						@enderror
					</span>
				</div>
			</div>
			{{-- <div class="col-lg-12 col-md-4 col-sm-4 col-12">
				<div class="form-group">
					<label style="margin-top: 10px">{{ trans('admin.panel.tag') }} *</label>
					@php
					if(isset($data)){
					$tag = $data->tags;
					$tags = $tag->map(function ($tag) {
					return $tag->name;
					}, $tag);
					}
					@endphp
					<input id="kt_tagify_1" value="{{ $tags ?? old('tags') }}" class="form-control tagify" name='tag' placeholder='type...' />
					<span class="form-text text-muted"></span>
				</div>
			</div> --}}
			{{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="form-group">
					<label>Choose Category:</label>
					<select class="form-control select2" id="kt_select2_101" name="category[]" multiple="multiple">
						@foreach (App\Models\Category::all() as $item)
						<option {{ isset($data) && App\Models\ContentCategory::where('category_id',$item->id)
							->where('content_id', $data->id)->first()
							? 'selected' :'' }} value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach
					</select>
					<span class="form-text text-muted"></span>
				</div>
			</div> --}}
			{{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="form-group">
					<label>{{ trans('admin.panel.language') }} *</label>
					<select name="language" id="language" class="form-control">
						@foreach (Config::get('languages') as $lang => $language)
						<option value="{{ $lang }}" {{ isset($data) && $data->language == $lang ? 'selected' : '' }}>{{
							$language }}</option>
						@endforeach
					</select>
					<span class="form-text text-muted"></span>
				</div>
			</div> --}}
			{{-- <div class="col-lg-12 col-md-4 col-sm-4 col-12">
				<div class="form-group">
					<label style="margin-top: 10px">{{ trans('admin.panel.comment.status') }}</label>
					<div class="radio-inline">
						<label style="margin-top: 10px" class="radio radio-solid radio-lg">
							<input type="radio" {{ isset($data->comment_status) && $data->comment_status == 0 ?
							'checked' :
							'' }} name="comment_status" value="0" />
							<span></span>
							Enable
						</label>
						<label style="margin-top: 10px" class="radio radio-solid radio-lg">
							<input type="radio" {{ isset($data->comment_status) && $data->comment_status == 1 ?
							'checked' :
							'' }} name="comment_status" value="1" />
							<span></span>
							Disable
						</label>
					</div>
				</div>
			</div> --}}
		</div>
	</div>
</div>

<hr>
<h4 class="card-title">This is field for optimize SEO</h4>

<div class="form-group row">
	<label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">{{ trans('admin.panel.meta.title') }}</label>
	<div class="col-lg-9 col-md-9 col-sm-9 col-9">
		<div class="input-group">
			<input type="text" class="form-control col-9" placeholder="{{ trans('admin.general.add') }} {{ trans('admin.panel.meta.title') }}" name="meta_title" value="{{ $data->meta_title ?? old('meta_title') }}" />
		</div>
		<span class="form-text text-danger">
			@error('meta_title')
			{{ $message }}
			@enderror
		</span>
	</div>
</div>

<div class="form-group row">
	<label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">{{ trans('admin.panel.meta.description') }}</label>
	<div class="col-lg-9 col-md-9 col-sm-9 col-9">
		<div class="input-group">
			<input type="text" class="form-control col-9" placeholder="{{ trans('admin.general.add') }} {{ trans('admin.panel.meta.description') }}" name="meta_description" value="{{ $data->meta_description ?? old('meta_description') }}" />
		</div>
		<span class="form-text text-danger">
			@error('meta_description')
			{{ $message }}
			@enderror
		</span>
	</div>
</div>

@push('page_style')
<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
{{-- <script src="{{ asset('js/pages/crud/forms/widgets/tagify.js') }}"></script> --}}
<script src="{{ asset('js/pages/custom/user/edit-user.js') }}"></script>
<script src="{{ asset('js/pages/crud/forms/validation/form-widgets.js') }}"></script>
{{-- <script src="{{ asset('js/pages/crud/forms/editors/tinymce/tinymce.bundle.js') }}"></script> --}}
<script>
	function formSubmit() {
		document.getElementById("status").value = "1";
		document.getElementById("kt_form").submit();
	}

	function formSubmitDraft() {
		document.getElementById("status").value = "0";
		document.getElementById("kt_form").submit();
	}

	function slugChange(slug) {
        document.getElementById("slug").value = slug.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
	}

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

			$('#kt_select2_4').select2({
				placeholder: "Select a lecture",
				allowClear: true
			});

			var data = [{
				id: 0,
				text: 'Enhancement'
			}, {
				id: 1,
				text: 'Bug'
			}, {
				id: 2,
				text: 'Duplicate'
			}, {
				id: 3,
				text: 'Invalid'
			}, {
				id: 4,
				text: 'Wontfix'
			}];
			$('#kt_select2_5').select2({
				placeholder: "Select a value",
				data: data
			});

			function formatRepo(repo) {
				if (repo.loading) return repo.text;
				var markup = "<div class='select2-result-repository clearfix'>" + "<div class='select2-result-repository__meta'>" + "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
				if (repo.description) {
					markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
				}
				markup += "<div class='select2-result-repository__statistics'>" + "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" + "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" + "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" + "</div>" + "</div></div>";
				return markup;
			}

			function formatRepoSelection(repo) {
				return repo.full_name || repo.text;
			}
			$("#kt_select2_6").select2({
				placeholder: "Search for git repositories",
				allowClear: true,
				ajax: {
					url: "https://api.github.com/search/repositories",
					dataType: 'json',
					delay: 250,
					data: function(params) {
						return {
							q: params.term,
							page: params.page
						};
					},
					processResults: function(data, params) {
						params.page = params.page || 1;
						return {
							results: data.items,
							pagination: {
								more: (params.page * 30) < data.total_count
							}
						};
					},
					cache: true
				},
				escapeMarkup: function(markup) {
					return markup;
				},
				minimumInputLength: 1,
				templateResult: formatRepo,
				templateSelection: formatRepoSelection
			});

			$('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
				placeholder: "Select an option",
			});

			$('#kt_select2_7').select2({
				placeholder: "Select an option"
			});

			$('#kt_select2_8').select2({
				placeholder: "Select an option"
			});

			$('#kt_select2_9').select2({
				placeholder: "Select an option",
				maximumSelectionLength: 2
			});

			$('#kt_select2_10').select2({
				placeholder: "Select an option",
				minimumResultsForSearch: Infinity
			});

			$('#kt_select2_11').select2({
				placeholder: "Add a tag",
				tags: true
			});

			$('.kt-select2-general').select2({
				placeholder: "Select an option"
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

<script>
	// document.querySelector("#file-custom").onchange = function(){
	// 	document.querySelector("#file-custom-label").textContent = this.files[0].name;
	// }
</script>
@endpush

@include('admin.shared.tinymce-init', ['selector' => '#tinyMceEditor'])