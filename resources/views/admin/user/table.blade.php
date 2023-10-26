<form action="{{ route('admin.user.export') }}" method="GET">
    <div class="row mb-10">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="form-group mb-0">
                <div class='input-group' id='kt_daterangepicker_2'>
                    <input type='text' name="created_at" id="date_range" class="form-control" placeholder="Register Date" />
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="form-group mb-0">
                <button class="btn btn-success" type="submit"><i class="la la-file-excel"></i> Export</button>
            </div>
        </div>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-separate table-head-custom collapsed" id="myDatatable">
        <thead>
            <tr>
                <th>NO</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>JOIN AT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>NO</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>JOIN AT</th>
                <th>ACTION</th>
            </tr>
        </tfoot>
    </table>
</div>
@push('page_script')
<script type="text/javascript">
    $(document).on("change", "#profession, #date_range", function(e) {
        reloadDatatable();
    });

    $(document).on("click", ".applyBtn", function(e) {
        reloadDatatable();
    });

    var table = $('#myDatatable').DataTable({
        order: [
            [3, "desc"]
        ],
        processing: true,
        serverSide: true,
        ajax: {
            "url": "{{ route('admin.user.table') }}",
            "data": function(d) {
                d.profession = $('#profession').val();
                d.created_at = $('#date_range').val();
            }
        },
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name',
                orderable: true,
                searchable: true
            },
            {
                data: 'email',
                name: 'email',
                orderable: true,
                searchable: true
            },
            {
                data: 'created_at',
                name: 'created_at',
                orderable: true,
                searchable: true
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    function reloadDatatable() {
        table.ajax.reload();
    }


    var KTBootstrapDaterangepicker = function() {

        var demos = function() {

            $('#kt_daterangepicker_2').daterangepicker({
                buttonClasses: ' btn',
                applyClass: 'btn-primary',
                cancelClass: 'btn-secondary'
            }, function(start, end, label) {
                $('#kt_daterangepicker_2 .form-control').val(start.format('YYYY-MM-DD') + '/' + end.format('YYYY-MM-DD'));
            });
        };

        return {
            init: function() {
                demos();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTBootstrapDaterangepicker.init();
    });


</script>
@endpush