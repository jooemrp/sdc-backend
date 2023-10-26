<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid align-items-center justify-content-between flex-wrap flex-sm-nowrap row">
        <!--begin::Info-->
        <div class="col-sm-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 d-flex mr-2">
            <!--begin::Page Title-->
            <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">@stack('title_page')</h6>
            <!--end::Page Title-->
            <!--begin::Action-->
            @stack('sub_title_page')
            <!--end::Action-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="col-sm-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 px-0">
            <div class="float-right">
                @stack('tools')
                <a href="{{ route('user.home') }}" target="_blank" class="btn btn btn-light-primary btn-sm font-weight-bold font-size-base mr-1 mt-1">
                    <i class="flaticon-home"></i>
                    User Home
                </a>
            </div>
            <!--begin::Actions-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>