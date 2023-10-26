@extends('layouts.admin.app')

@push('title_page')
{{ trans('admin.panel.role') }}
@endpush
@push('sub_title_page')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted">Form</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted">Update</a>
    </li>
</ul>
@endpush

@section('content')
<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">{{ trans('admin.crud.create') }} {{ trans('admin.panel.role') }}</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.role.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
            <div class="btn-group">
                <button type="button" onclick="formSubmit()" class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-xs"></i>Update
                </button>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ route('admin.role.update', $data->id) }}" method="POST" enctype="multipart/form-data" id="kt_form">
        @csrf
        <div class="card-body">
            @include('admin.role.fields')
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection