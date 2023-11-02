@csrf
<input type="hidden" name="slug" id="slug" value="{{ $data->slug ?? old('slug') }}">
<div class="row">

    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mb-4">
        <label>Title *</label>
        <input type="text" value="{{ $data->title ?? old('title') }}" class="form-control" placeholder="Title" name="title" onchange="slugChange(this.value)" />
    </div>

    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mb-4">
        <label>Category *</label>
        <select name="category" id="category" class="form-control">
            <option value="">-- Select category --</option>
            <option value="Content Creation" {{ isset($data) && $data->category == 'Content Creation' }}>Content Creation</option>
            <option value="Paid Marketing" {{ isset($data) && $data->category == 'Paid Marketing' }}>Paid Marketing</option>
            <option value="Content Marketing" {{ isset($data) && $data->category == 'Content Marketing' }}>Content Marketing</option>
        </select>
    </div>

    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb-4">
        <label>Preview *</label>
        <textarea name="preview" id="preview" placeholder="Preview" cols="30" rows="3" class="form-control">{{ $data->preview ?? old('preview') }}</textarea>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
        <label>Color</label>
        <input type="text" value="{{ $data->color ?? old('color') }}" class="form-control" placeholder="black, sips-navy, sips-maroon, sips-green, sips-orange" name="color" />
    </div>

    <div class="col-12 mb-4">
        <label>Challenge *</label>
        <textarea name="challenge" id="challenge" placeholder="Challenge" cols="30" rows="10" class="form-control">{{ $data->challenge ?? old('challenge') }}</textarea>
    </div>

    <div class="col-12 mb-4">
        <label>Approach *</label>
        <textarea name="approach" id="approach" placeholder="Approach" cols="30" rows="10" class="form-control">{{ $data->approach ?? old('approach') }}</textarea>
    </div>

    <div class="col-12 mb-4">
        <label>Result *</label>
        <textarea name="result" id="result" placeholder="Result" cols="30" rows="10" class="form-control">{{ $data->result ?? old('result') }}</textarea>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
        <div class="form-group">
            <label>Thumbnail *</label>
            <input type="file" onchange="document.getElementById('file-custom-label').innerHTML = this.files[0].name" style="display:none;" id="file-custom" aria-label="File browser example" name="thumbnail" accept="image/png, image/jpeg, image/jpg">
            <label for="file-custom" type="button" id="file-custom-label" class="btn btn-primary form-control" id="upload">{{ isset($data) ? 'Replace' : 'Upload' }}</label>
            @if (isset($data) && $data->img_url)
            <a href="{{ $data->img_url }}" target="_blank">View</a>
            @else
            <small>No thumbnail yet</small>
            @endif
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
        <div class="form-group">
            <label>File </label>
            <input type="file" onchange="document.getElementById('file-custom-2-label').innerHTML = `Selected ${this.files.length} files`" style="display:none;" id="file-custom-2" aria-label="File browser example" name="content[]" accept="image/png, image/jpeg, image/jpg" multiple>
            {{-- TO DO: show content list --}}
            <label for="file-custom-2" type="button" id="file-custom-2-label" class="btn btn-primary form-control" id="upload">{{ isset($data) ? 'Replace all' : 'Upload' }}</label>
            @if (isset($data) && $data->getMedia('Work_content')->count() > 0)
            @foreach ($data->getMedia('Work_content') as $content)
            <a href="{{ $content->getUrl() }}" target="_blank">View</a>
            <br>
            @endforeach
            @else
            <small>No content yet</small>
            @endif
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
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">{{ trans('admin.panel.meta.description') }}</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="text" class="form-control col-9" placeholder="{{ trans('admin.general.add') }} {{ trans('admin.panel.meta.description') }}" name="meta_description" value="{{ $data->meta_description ?? old('meta_description') }}" />
        </div>
    </div>
</div>



@push('page_style')
<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
<script>
    function formSubmit() {
		document.getElementById("kt_form").submit();
	}
    function slugChange(slug) {
        document.getElementById("slug").value = slug.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
	}
</script>
@endpush