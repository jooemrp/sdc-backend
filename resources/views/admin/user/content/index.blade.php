@extends('admin.user.show')
@section('content_user')
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::List Widget 14-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">Log Activity</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-2">
                    <table class="table table-separate table-head-custom collapsed" id="kt_datatable">
                        <thead>
                            <tr class="text-left text-uppercase">
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">No</div>
                                </th>
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Activity</div>
                                </th>
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Url</div>
                                </th>
                                <th class="pr-0">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Date</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($user->logs as $key => $log)
                            <tr>
                                <td>
                                    {{ $key+1 }}
                                </td>
                                <td>
                                    <div class="text-dark-75">
                                        {{ $log->subject != '-' ? $log->subject : 'Admin Panel' }}
                                    </div>
                                </td>
                                <td>
                                    <a target="_blank" href="{{ $log->url }}">
                                        {{ Str::limit($log->url, 40) }}
                                    </a>
                                </td>
                                <td>
                                    {{ $log->created_at }}
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                        <tfoot>
                            <tr class="text-left text-uppercase">
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">No</div>
                                </th>
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Activity</div>
                                </th>
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Url</div>
                                </th>
                                <th class="pr-0">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Date</div>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!--end::Body-->
            </div>
            <!--end::List Widget 14-->
        </div>
    </div>
    <!--end::Row-->
</div>
@endsection