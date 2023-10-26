@extends('admin.user.show')
@section('content_user')
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your personal information</span>
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('admin.user.personal.update', $user->id) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!--begin::Form Group-->
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">avatar</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('avatar_url') is-invalid @enderror"
                                name="avatar_url" value="{{ $user->avatar_url }}" id="customFile"
                                accept="image/png, image/jpeg">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <span class="form-text text-danger">
                                @error('avatar_url')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">name</label>
                    <div class="col-lg-9 col-xl-6">
                        <input
                            class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                            type="text" name="name" value="{{ $user->name }}" />
                        <span class="form-text text-danger">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">Contact Phone</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group input-group-lg input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="la la-phone"></i>
                                </span>
                            </div>
                            <input type="text"
                                class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror"
                                name="phone" value="{{ $user->phone }}" placeholder="Phone">
                        </div>
                        <span class="form-text text-danger">
                            @error('phone')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">province</label>
                    <div class="col-lg-9 col-xl-6">
                        <input
                            class="form-control form-control-lg form-control-solid @error('province') is-invalid @enderror"
                            name="province" type="text" value="{{ $user->province }}" />
                        <span class="form-text text-danger">
                            @error('province')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">city</label>
                    <div class="col-lg-9 col-xl-6">
                        <input
                            class="form-control form-control-lg form-control-solid @error('city') is-invalid @enderror"
                            name="city" type="text" value="{{ $user->city }}" />
                        <span class="form-text text-danger">
                            @error('city')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">address</label>
                    <div class="col-lg-9 col-xl-6">
                        <input
                            class="form-control form-control-lg form-control-solid @error('address') is-invalid @enderror"
                            name="address" type="text" value="{{ $user->address }}" />
                        <span class="form-text text-danger">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">birth</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="input-group date">
                            <input type="text"
                                class="form-control form-control-lg form-control-solid @error('birth') is-invalid @enderror"
                                name="birth" readonly value="{{ $user->birth }}" id="kt_datepicker_3" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <span class="form-text text-danger">
                            @error('birth')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label text-capitalize">company</label>
                    <div class="col-lg-9 col-xl-6">
                        <input
                            class="form-control form-control-lg form-control-solid @error('company') is-invalid @enderror"
                            name="company" type="text" value="{{ $user->company }}" />
                        <span class="form-text text-danger">
                            @error('company')
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