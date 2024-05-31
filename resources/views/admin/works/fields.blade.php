@csrf
<input type="hidden" name="slug" id="slug" value="{{ $data->slug ?? old('slug') }}">
<div class="row">

    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 mb-4">
        <label>Title *</label>
        <input type="text" value="{{ $data->title ?? old('title') }}" class="form-control" placeholder="Title" name="title" onkeyup="slugChange(this.value)" />
        <span class="form-text text-danger">
            @error('title')
            {{ $message }}
            @enderror
        </span>
    </div>

    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 mb-4">
        <label>Category</label>
        <input type="text" value="{{ $data->category ?? old('category') }}" class="form-control" placeholder="Paid Marketing, Content Creation, Content Marketing or etc" name="category" />
        <span class="form-text text-danger">
            @error('category')
            {{ $message }}
            @enderror
        </span>
    </div>

    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 mb-4">
        <label>Preview *</label>
        <textarea name="preview" id="preview" placeholder="Preview" cols="30" rows="3" class="form-control">{{ $data->preview ?? old('preview') }}</textarea>
        <span class="form-text text-danger">
            @error('preview')
            {{ $message }}
            @enderror
        </span>
    </div>

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
        <label>Color</label>
        <input type="text" value="{{ $data->color ?? old('color') }}" class="form-control" placeholder="black, sips-navy, sips-maroon, sips-green, sips-orange" name="color" />
        <span class="form-text text-danger">
            @error('color')
            {{ $message }}
            @enderror
        </span>
    </div>

    <div class="col-12 mb-4">
        <label>Challenge *</label>
        <textarea name="challenge" id="tinyMceEditor-challenge" placeholder="Challenge" cols="30" rows="10" class="form-control">{{ $data->challenge ?? old('challenge') }}</textarea>
        <span class="form-text text-danger">
            @error('challenge')
            {{ $message }}
            @enderror
        </span>
    </div>

    <div class="col-12 mb-4">
        <label>Approach *</label>
        <textarea name="approach" id="tinyMceEditor-approach" placeholder="Approach" cols="30" rows="10" class="form-control">{{ $data->approach ?? old('approach') }}</textarea>
        <span class="form-text text-danger">
            @error('approach')
            {{ $message }}
            @enderror
        </span>
    </div>

    <div class="col-12 mb-4">
        <label>Result *</label>
        <textarea name="result" id="tinyMceEditor-result" placeholder="Result" cols="30" rows="10" class="form-control">{{ $data->result ?? old('result') }}</textarea>
        <span class="form-text text-danger">
            @error('result')
            {{ $message }}
            @enderror
        </span>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
        <div class="form-group">
            <label>Thumbnail *</label>
            <input type="file" onchange="document.getElementById('file-custom-label').innerHTML = this.files[0].name" style="display:none;" id="file-custom" aria-label="File browser example" name="thumbnail" accept=".png, .jpg, .jpeg, .webp">
            <label for="file-custom" type="button" id="file-custom-label" class="btn btn-primary form-control" id="upload">{{ isset($data) ? 'Replace' : 'Upload' }}</label>
            @if (isset($data) && $data->img_url)
            <a href="{{ $data->img_url }}" target="_blank">View</a>
            @else
            <small>No thumbnail yet</small>
            @endif

            <span class="form-text text-danger">
                @error('thumbnail')
                {{ $message }}
                @enderror
            </span>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
        <div class="form-group">
            <label>File </label>
            <input type="file" onchange="document.getElementById('file-custom-2-label').innerHTML = `Selected ${this.files.length} files`" style="display:none;" id="file-custom-2" aria-label="File browser example" name="content[]" accept=".png, .jpg, .jpeg, .webp" multiple>
            {{-- TO DO: show content list --}}
            <label for="file-custom-2" type="button" id="file-custom-2-label" class="btn btn-primary form-control" id="upload">Upload</label>
            @if (isset($data) && $data->getMedia('Work_content')->count() > 0)
            <form></form>
            @foreach ($data->getMedia('Work_content') as $key => $content)
            <a href="{{ $content->getUrl() }}" target="_blank">{{ $content->name }} [{{ $key }}]</a> <a href="javascript:void(0)" class="text-danger" onclick="document.getElementById('remove-media-{{ $key }}').submit()">&#x2715</a>
            <br>
            <form action="{{ route('admin.works.media.remove', [$data->id, $key]) }}" method="POST" id="remove-media-{{ $key }}">
                @method('DELETE')
                @csrf
            </form>
            @endforeach
            @else
            <small>No content yet</small>
            @endif

            <span class="form-text text-danger">
                @error('content'){{ $message }}@enderror
                @error('content.*'){{ $message }}@enderror
            </span>
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

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">{{ trans('admin.panel.meta.keywords') }}</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="text" class="form-control col-9" placeholder="Write your meta keywords here, this is how you keywords a meta tags, anything else you want to write" name="meta_keywords" value="{{ $data->meta_keywords ?? old('meta_keywords') }}" />
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

@include('admin.shared.tinymce-init', ['selector' => '#tinyMceEditor-challenge, #tinyMceEditor-approach, #tinyMceEditor-result'])