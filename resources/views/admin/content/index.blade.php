@extends('layouts.admin.app')

@push('page_style')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

@endpush

@push('page_script')
{{-- <script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}"></script> --}}

<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/pages/crud/datatables/extensions/responsive.js') }}"></script>
@endpush

@push('title_page')
{{ trans('admin.panel.content') }}
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{ trans('admin.panel.table') }}</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ route('admin.content.create', ['type' => request()->type]) }}" class="btn btn-primary font-weight-bolder">
                <i class="la la-plus"></i>{{ trans('admin.general.new') }} {{ trans('admin.panel.record') }}</a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        @include('admin.content.table')
        <!--end: Datatable-->
    </div>
</div>
@endsection