@extends('layouts.admin.app')

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
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
        <h3 class="card-title">{{ trans('admin.crud.create') }} Works</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.works.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
            <div class="btn-group">
                <button type="button" onclick="formSubmit()" class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-xs"></i>Save
                </button>
            </div>
        </div>
    </div>

    <!--begin::Form-->
    <form class="form" action="{{ route('admin.works.update', $data->id) }}" method="POST" enctype="multipart/form-data" id="kt_form">
        @csrf
        <div class="card-body">
            @include('admin.works.fields')
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection