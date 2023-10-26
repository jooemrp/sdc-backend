<table class="table table-separate table-head-custom collapsed" id="myDatatable">
    <thead>
        <tr>
            <th>ID</th>
            <!-- <th>User</th> -->
            <th>Title</th>
            <th>Status</th>
            {{-- <th>Language</th> --}}
            <th>Views</th>
            <th>Created At</th>
            <th>Featured At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <!-- <th>User</th> -->
            <th>Title</th>
            <th>Status</th>
            {{-- <th>Language</th> --}}
            <th>Views</th>
            <th>Created At</th>
            <th>Featured At</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>

@push('page_script')
<script type="text/javascript">
    $(function() {

        var table = $('#myDatatable').DataTable({
            order: [
                [4, "desc"],
            ],
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.content.table', ['type' => request()->type]) }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'title',
                    name: 'title',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: true,
                    searchable: true
                },
                // {
                //     data: 'language',
                //     name: 'language',
                //     orderable: true,
                //     searchable: true
                // },
                {
                    data: 'views',
                    name: 'views',
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
                    data: 'featured_at',
                    name: 'featured_at',
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

    });
</script>
@endpush