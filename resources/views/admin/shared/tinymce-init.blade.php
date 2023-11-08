@push('page_style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

@push('page_script')
<script src="{{ asset('js/pages/crud/forms/editors/tinymce/tinymce.bundle.js') }}"></script>
<script>
    // Init tinymce
    tinymce.init({
		selector: @json($selector),  // example #tinyMceEditor
		images_upload_handler: function (blobInfo, success, failure) {
			var xhr, formData;
			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', @json(route('admin.file-manager.store')));

			xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
					failure('HTTP Error : ' + xhr.status);
					return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.location != 'string') {
					console.log(xhr.response);
					failure('Failed : ' + xhr.responseText.url);
					return;
				} 
				
				success(json.location);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());
			// append CSRF token in the form data
			
			formData.append('_token', $('meta[name="csrf-token"]').attr("content"));

			xhr.send(formData);
		},
		height : "500",
		menubar: false,
		toolbar: [
			"undo redo | cut copy paste | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | blockquote- subscript superscript | charmap | hr | fullscreen",
			"styleselect fontselect fontsizeselect | bold italic | forecolor backcolor- | link | image | preview",
			"table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol"
		],
		plugins : "advlist autolink link image lists charmap preview fullscreen table textcolor hr contextmenu",
  		fullscreen_native: false,
		image_list: JSON.parse('{!! UserMediaHelper::imageList() !!}'),
  		font_formats: "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Poppins=poppins; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats;",
		content_style: "@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');",
    	contextmenu: "paste | link image inserttable | cell row column deletetable",
	});
</script>

@endpush