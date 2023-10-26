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
                    <h3 class="card-title font-weight-bolder text-dark">Emails</h3>
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
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Subject</div>
                                </th>
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Opens</div>
                                </th>
                                <th class="pr-0">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Click</div>
                                </th>
                                <th class="pr-0">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Created At</div>
                                </th>
                                <th class="pr-0">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Opened At</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sent_mails as $key => $sent_mail)
                            <tr>
                                <td>
                                    {{ $key+1 }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/email-manager/show-email/'.$sent_mail->id) }}"
                                        target="_blank">

                                        {{ $sent_mail->subject }}
                                    </a>

                                </td>
                                <td>
                                    {{ $sent_mail->opens }}
                                </td>
                                <td>
                                    {{ $sent_mail->clicks }}
                                </td>
                                <td>
                                    {{ $sent_mail->created_at }}
                                </td>
                                <td>
                                    {{ $sent_mail->opened_at }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-left text-uppercase">
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">No</div>
                                </th>
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Subject</div>
                                </th>
                                <th class="pl-2">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Opens</div>
                                </th>
                                <th class="pr-0">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Click</div>
                                </th>
                                <th class="pr-0">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Created At</div>
                                </th>
                                <th class="pr-0">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg">Opened At</div>
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