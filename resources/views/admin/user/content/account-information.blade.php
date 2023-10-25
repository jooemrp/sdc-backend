@extends('admin.user.show')
@section('content_user')
<div class="flex-row-fluid ml-lg-8">
    {{--
    `users`.`email`,
    `users`.`email_verified_at`,
    `users`.`id_no`,
    `users`.`idi_no_status`,
    `users`.`profession`,
    `users`.`name_on_certificate`,
    --}}
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Account Information</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account settings</span>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('admin.user.personal.update', $user->id) }}">
            @csrf
            <div class="card-body">
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">Email Address</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-at"></i>
                                </span>
                            </div>
                            <input
                                class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                type="text" name="email" value="{{ $user->email }}" />
                        </div>
                        <span class="form-text text-danger">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">name on certificate</label>
                    <div class="col-lg-9 col-xl-6">
                        <input
                            class="form-control form-control-lg form-control-solid @error('name_on_certificate') is-invalid @enderror"
                            type="text" name="name_on_certificate" value="{{ $user->name_on_certificate }}" />
                        <span class="form-text text-danger">
                            @error('name_on_certificate')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">profession</label>
                    <div class="col-lg-9 col-xl-6">
                        <input
                            class="form-control form-control-lg form-control-solid @error('profession') is-invalid @enderror"
                            type="text" name="profession" value="{{ $user->profession }}" />
                        <span class="form-text text-danger">
                            @error('profession')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">Role</label>
                    <div class="col-lg-9 col-xl-6">
                        <select
                            class="form-control form-control-lg form-control-solid select2 col-12 @error('role') is-invalid @enderror"
                            id="kt_select2_102" name="role[]" multiple="multiple">
                            <option></option>
                            @foreach (App\Models\Role::all() as $item)
                            <option @php if (isset($user)) { foreach(App\Models\User::find($user->id)->getRoleNames() as
                                $role) { if
                                ($role == $item->name){ echo "selected"; }}} @endphp
                                value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                        <span class="form-text text-danger">
                            @error('role')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
</div>
@endsection