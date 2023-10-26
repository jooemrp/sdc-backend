@extends('admin.user.show')
@section('content_user')
<div class="flex-row-fluid ml-lg-8">
    <!--begin::Card-->
    <div class="card card-custom">
        <!--begin::Header-->
        <div class="card-header py-3">
            <div class="card-title align-items-start flex-column">
                <h3 class="card-label font-weight-bolder text-dark">Password</h3>
                <span class="text-muted font-weight-bold font-size-sm mt-1">Change your Password</span>
            </div>
            <div class="card-toolbar">
                <button class="btn btn-success mr-2" onclick="formSubmitPassword()">Save Changes</button>
                {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form class="form" method="POST" action="{{ route('admin.user.password.update', $user->id) }}" id="password_form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" />
                    <span class="form-text text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
</div>
@endsection

@push('page_script')
<script>
    function formSubmitPassword() {
        document.getElementById("password_form").submit();
    }
</script>
@endpush