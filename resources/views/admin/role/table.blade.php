<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Guard</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->guard_name }}</td>
            <td>
                <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                        <i class="la la-cog"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.role.edit', $role->id) }}">
                                    <i class="nav-icon la la-edit"></i>
                                    <span class="nav-text">{{ trans('admin.crud.update') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.role.edit', $role->id) }}">
                                    <i class="nav-icon la la-eye"></i>
                                    <span class="nav-text">{{ trans('admin.crud.read') }}</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <form id="formDelete[{{ $role->id }}]" method="POST"
                                    action="{{ route('admin.role.destroy',$role->id) }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $role->id }}">
                                </form>
                                <a class="nav-link deleteButton" onclick="deleteFunction({{ $role->id }})">
                                    <i class="nav-icon la la-trash"></i>
                                    <span class="nav-text">Delete</span>
                                </a>

                            </li> --}}
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Guard</th>
            <th>Actions</th>
        </tr>
    </tfoot>
</table>