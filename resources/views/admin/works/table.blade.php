<div class="table-responsive">
    <table class="table table-separate table-head-custom collapsed" id="kt_datatable">
        <thead>
            <tr>
                <th>NO</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category }}</td>
                <td>
                    <div class="dropdown dropdown-inline">
                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                            <i class="la la-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <ul class="nav nav-hoverable flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.works.edit', $post->id) }}"><i class="nav-icon la la-edit"></i>
                                        <span class="nav-text">
                                            Edit
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form id="formDelete[{{ $post->id }}]" method="POST" action="{{ route('admin.works.destroy',$post->id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <input type="hidden" name="id" value="{{ $post->id }}">
                                    </form>
                                    <a class="nav-link deleteButton" onclick="deleteFunction({{ $post->id }})">
                                        <i class="nav-icon la la-trash"></i>
                                        <span class="nav-text">Delete</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>NO</th>
                <th>Title</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="modalKu" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">User Downloads</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                Loading...
            </div>
        </div>
    </div>
</div>

@push('page_script')
<script>
    $(document).on("click", ".showUserDownloads", function(e) {
        e.preventDefault();

        $.get(
            $(this).data('href'),
            function(res) {
                $("#modal-title").html('User Downloads');
                $("#modal-body").html(res);
                $("#modalKu").modal("show");
            }
        );
    });

    $(document).on("click", ".showQuizSubmits", function(e) {
        e.preventDefault();

        $.get(
            $(this).data('href'),
            function(res) {
                $("#modal-title").html('User Submit Quiz');
                $("#modal-body").html(res);
                $("#modalKu").modal("show");
            }
        );
    });

    $('#modalKu').on('hide.bs.modal', function() {
        setTimeout(function() {
            $('#modal-body').html('');
        }, 500);
    });
</script>
@endpush