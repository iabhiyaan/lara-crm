<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Admin Panel</title>
    <meta name="description"
          content="Check out all the features of the Start admin panel. A large number of templates, components and widgets."/>
    <meta name="keywords"
          content="Start, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard, html admin theme, html template"/>
    <link rel="canonical" href="https://preview.keenthemes.com/start"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="/assets/admin/media/logos/favicon.ico"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="/assets/admin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/admin/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    {{ $styles ?? null }}
    @stack('styles')
</head>

<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-enabled aside-fixed aside-primary-disabled aside-secondary-enabled">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside bg-info" data-kt-drawer="false" data-kt-drawer-name="aside"
             data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="false"
             data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
             data-kt-drawer-toggle="#kt_aside_toggler">
            <!--begin::Secondary-->
            <div class="aside-secondary d-flex flex-row-fluid bg-white position-relative">
                <!--begin::Workspace-->
                <div class="aside-workspace my-7 ps-5 pe-4 ps-lg-10 pe-lg-6" id="kt_aside_wordspace">
                    <!--begin::Logo-->
                    <div class="aside-logo py-2 pb-7" id="kt_aside_logo">
                        <a href="../index-2.html">
                            <img alt="Logo" src="/assets/admin/media/logos/logo-compact.svg" class="mh-50px"/>
                        </a>
                    </div>
                    <!--end::Logo-->
                    <!--begin::Aside Menu-->
                    <!--begin::Menu-->
                    <div
                        class="menu menu-column menu-rounded menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-6"
                        data-kt-menu="true">
                        <div class="hover-scroll-y pe-4 pe-lg-5" id="kt_aside_menu_scroll" data-kt-scroll="true"
                             data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo"
                             data-kt-scroll-wrappers="#kt_aside_wordspace" data-kt-scroll-offset="10px">
                            <div class="menu-wrapper menu-column menu-fit">
                                @can(permissionConstant()::DASHBOARD['view-dashboard'])
                                    <x-nav-item :route="route('dashboard')" menu-title="Dashboard"/>
                                @endcan

                                @can(permissionConstant()::ROLES['view-roles'])
                                    <x-nav-item :route="route('roles.index')" menu-title="Roles"/>
                                @endcan

                                @can(permissionConstant()::USERS['view-users'])
                                    <x-expandable-nav-item menu-title="Users"
                                                           :view-role="permissionConstant()::USERS['view-users']"
                                                           :alter-role="permissionConstant()::USERS['alter-users']"
                                                           :list-route="route('users.index')"
                                                           :create-route="route('users.create')"></x-expandable-nav-item>
                                @endcan

                                @can(permissionConstant()::FOLDERS['view-folders'])
                                    <x-expandable-nav-item menu-title="Folders"
                                                           :view-role="permissionConstant()::FOLDERS['view-folders']"
                                                           :alter-role="permissionConstant()::FOLDERS['alter-folders']"
                                                           :list-route="route('folder.index')"
                                                           :create-route="route('folder.create')"></x-expandable-nav-item>
                                @endcan

                                @can(permissionConstant()::LEADS['view-leads'])
                                    <x-expandable-nav-item menu-title="Leads"
                                                           :view-role="permissionConstant()::LEADS['view-leads']"
                                                           :alter-role="permissionConstant()::LEADS['alter-leads']"
                                                           :list-route="route('leads.index')"
                                                           :create-route="route('leads.create')"></x-expandable-nav-item>
                                @endcan

                            </div>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Workspace-->
                <div class="dismiss__sidebar btn btn-icon btn-sm btn-light-primary ms-2">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                   fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2"
                                          rx="1"></rect>
                                    <rect fill="#000000" opacity="0.5"
                                          transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                          x="0" y="7" width="16" height="2" rx="1">
                                    </rect>
                                </g>
                            </svg>
                        </span>
                </div>
            </div>
            <!--end::Secondary-->

        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
                 data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <!--begin::Container-->
                <div class="container d-flex align-items-stretch justify-content-between">
                    <!--begin::Left-->
                    <div class="d-flex align-items-center">
                        <!--begin::Mega Menu Toggler-->
                        <button class="d-none btn btn-icon btn-accent me-3 me-lg-6" id="kt_aside_toggler">
                            <!--begin::Svg Icon | path: icons/stockholm/Text/Article.svg-->
                            <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" x="4" y="5" width="16"
                                                  height="3" rx="1.5"/>
                                            <path
                                                d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L12.5,10 C13.3284271,10 14,10.6715729 14,11.5 C14,12.3284271 13.3284271,13 12.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                                fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg>
                                </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Mega Menu Toggler-->
                    </div>
                    <!--end::Left-->
                    <!--begin::Right-->
                    <div class="d-flex align-items-center justify-content-center">
                        <!--begin::User-->
                        <div class="ms-1 ms-lg-6">
                            <!--begin::Toggle-->
                            <div class="btn btn-icon btn-sm btn-active-bg-accent" data-kt-menu-trigger="click"
                                 data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/stockholm/General/User.svg-->
                                <span class="svg-icon svg-icon-1 svg-icon-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path
                                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path
                                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                    </span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--begin::Menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-300px"
                                data-kt-menu="true">
                                <div
                                    class="menu-content fw-bold d-flex align-items-center bgi-no-repeat bgi-position-y-top rounded-top"
                                    style="background-image:url('/assets/admin/media/misc/dropdown-header-bg.jpg')">
                                    <div class="symbol symbol-45px mx-5 py-5">
                                            <span class="symbol-label bg-primary align-items-end">
                                                <img alt="Logo" src="/assets/admin/media/svg/avatars/001-boy.svg"
                                                     class="mh-35px"/>
                                            </span>
                                    </div>
                                    <div class="">
                                            <span class="text-white fw-bolder fs-4">Hello,
                                                {{ auth()->user()->name }}</span>
                                        <span
                                            class="text-white fw-bold fs-7 d-block">{{ auth()->user()->roles->pluck('name')[0] ?? 'N/a' }}</span>
                                    </div>
                                </div>
                                <!--begin::Row-->
                                <div class="row row-cols-2 g-0 justify-content-center">

                                    <a href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="col text-center py-10 btn btn-active-color-primary rounded-0">
                                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Sign-out.svg-->
                                        <span class="svg-icon svg-icon-3x me-n1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                       fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                              height="24"/>
                                                        <path
                                                            d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.5"
                                                            transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000)"/>
                                                        <rect fill="#000000" opacity="0.5"
                                                              transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000)"
                                                              x="13" y="6" width="2"
                                                              height="12" rx="1"/>
                                                        <path
                                                            d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000)"/>
                                                    </g>
                                                </svg>
                                            </span>
                                        <!--end::Svg Icon-->
                                        <span class="fw-bolder fs-6 d-block pt-3">Sign Out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Right-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Main-->
            <div class="container d-flex flex-column flex-column-fluid">
                @if (session('successMessage'))
                    <x-alert type="success" :message="session('successMessage')"></x-alert>
                @endif
                <!--begin::toolbar-->
                <div class="toolbar" id="kt_toolbar">
                    <div class="container d-flex flex-stack flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-1">
                            <!--begin::Title-->
                            <h3 class="text-dark fw-bolder my-1">{{ $title ?? null }}</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Info-->
                    </div>
                </div>
                <!--end::toolbar-->
                {{ $slot }}
            </div>
            <!--end::Main-->
            <!--begin::Footer-->
            <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div
                    class="container d-flex flex-column flex-md-row flex-stack justify-content-center text-center">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-2">{{ date('Y') }}
                                {{--                            © --}}
                            </span>
                        {{--                        <a href="http://abhiyanshrestha.com.np/" target="_blank" --}}
                        {{--                           class="text-gray-800 text-hover-primary">Abhiyan Shrestha</a> --}}
                    </div>
                    <!--end::Copyright-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/stockholm/Navigation/Up-2.svg-->
    <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                 height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2"
                          height="10" rx="1"/>
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero"/>
                </g>
            </svg>
        </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="/assets/admin/plugins/global/plugins.bundle.js"></script>
<script src="/assets/admin/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="/assets/admin/js/custom/widgets.js"></script>
<script src="/assets/admin/js/custom/modals/create-app.js"></script>
<script src="/assets/admin/js/custom/modals/select-location.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
{{ $scripts ?? null }}
@stack('scripts')
<script>
    $('#kt_aside_toggler').click(function () {
        $('div#kt_aside').addClass('translateInWindow').removeClass('translateFromWindow')
        $('.aside-primary-disabled.aside-secondary-enabled.aside-fixed .wrapper').removeClass('pl-0')
        $(this).addClass('d-none')
    })
    $('.dismiss__sidebar').click(function () {
        $('#kt_aside_toggler').toggleClass('d-none')
        $('div#kt_aside').addClass('translateFromWindow').removeClass('translateInWindow')
        $('.aside-primary-disabled.aside-secondary-enabled.aside-fixed .wrapper').toggleClass('pl-0')
    })
</script>
</body>

</html>
