@extends('layouts.admin.app')

@push('title_page')
{{ trans('admin.panel.content') }}
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
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
    <div class="card-header">
        <h3 class="card-title">View {{ trans('admin.panel.content') }}</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.contact.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-xs"></i>Back
            </a>
        </div>
    </div>
    <!--begin::Form-->

    {{-- <form action="{{ route('admin.contact.update', $data->id) }}" method="POST" enctype="multipart/form-data" id="kt_form">
        @csrf
        @method('PUT') --}}
        <div class="card-body">
            @include('admin.contact.fields')
        </div>
        {{--
    </form> --}}
    <!--end::Form-->
</div>
@endsection