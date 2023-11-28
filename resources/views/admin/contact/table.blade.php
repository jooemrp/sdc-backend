<table class="table table-separate table-head-custom collapsed" id="myDatatable">
    <thead>
        <tr>
            <th class="w-25px">No</th>
            <th class="w-250px">Name</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Last Opened By</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->company }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->user?->name }}</td>
            <td>
                <div class=" dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                        <i class="la la-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.contact.edit', $item->id) }}">
                                    <i class="nav-icon la la-eye"></i>
                                    <span class="nav-text">{{ trans('admin.crud.read') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <form id="formDelete[{{ $item->id }}]" method="POST" action="{{ route('admin.contact.destroy', $item->id) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                </form>
                                <a class="nav-link deleteButton" onclick="deleteFunction({{ $item->id }})">
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
            <th>No</th>
            <th>Name</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Last Opened By</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>