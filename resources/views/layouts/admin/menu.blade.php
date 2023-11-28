<li class="menu-item menu-item {{ Request::is('admin/home*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
    <a href="{{ route('admin.home') }}" class="menu-link">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Dashboard</span>
    </a>
</li>

<li class="menu-section mt-0">
    <h4 class="menu-text">Content</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item menu-item-submenu {{ Request::is('admin/content*') ? 'menu-item-open menu-item-here' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Text\Article.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                    <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Content</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item {{ Request::is('admin/content/create*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.content.create') }}" class="menu-link">
                    <i class="menu-icon fas fa-plus">
                        <span></span>
                    </i>
                    <span class="menu-text">New {{ trans('admin.panel.content') }}</span>
                </a>
            </li>

            @foreach (Config::get('content-type') as $type => $value)
            @if (App\Models\Content::where('type', $type)->count() > 0)
            <li class="menu-item {{ Request::is('admin/content/'.$type.'*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.content.index', ['type' => $type]) }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text">{{ $value }}</span>
                </a>
            </li>
            @endif
            @endforeach

        </ul>
    </div>
</li>
<li class="menu-item menu-item {{ Request::is('admin/works*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
    <a href="{{ route('admin.works.index') }}" class="menu-link">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Archive.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#000000" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">Our Work</span>
    </a>
</li>


<li class="menu-section mt-0">
    <h4 class="menu-text">Cooperation</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item menu-item {{ Request::is('admin/contact*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
    <a href="{{ route('admin.contact.index') }}" class="menu-link">
        <span class="svg-icon menu-icon">
            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Address-card.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
        <span class="menu-text">@lang('admin.panel.contact')</span>
    </a>
</li>

<li class="menu-section mt-0">
    <h4 class="menu-text">User & Role</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item menu-item-submenu 
            {{ Request::is('admin/role*') ? 'menu-item-open menu-item-here' : '' }}
            {{ Request::is('admin/user*') ? 'menu-item-open menu-item-here' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <i class="menu-icon flaticon-user-settings"></i>
        <span class="menu-text">User Management</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item {{ Request::is('admin/role*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.role.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text">{{ trans('admin.panel.role') }}</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/user*') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{ route('admin.user.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text">User</span>
                </a>
            </li>
        </ul>
    </div>
</li>