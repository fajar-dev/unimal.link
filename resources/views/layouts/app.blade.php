<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'URL Shortener') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
                if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                        themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                } else {
                        if (localStorage.getItem("data-bs-theme") !== null) {
                                themeMode = localStorage.getItem("data-bs-theme");
                        } else {
                                themeMode = defaultThemeMode;
                        }
                }
                if (themeMode === "system") {
                        themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
					<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
						<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show sidebar menu">
							<div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
								<i class="ki-outline ki-abstract-14 fs-2"></i>
							</div>
						</div>
						<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
							<a href="{{ route('index') }}">
								<img alt="Logo" src="{{ asset('assets/media/logos/demo30.svg') }}" class="h-25px d-lg-none" />
								<img alt="Logo" src="{{ asset('assets/media/logos/demo30.svg') }}" class="h-30px d-none d-lg-inline app-sidebar-logo-default theme-light-show" />
								<img alt="Logo" src="{{ asset('assets/media/logos/demo30.svg') }}" class="h-30px d-none d-lg-inline app-sidebar-logo-default theme-dark-show" />
							</a>
						</div>
						<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
							<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
								<div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
									<a href="" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
										<span class="menu-link">
											<span class="menu-title">Home</span>
										</span>
									</a>
                                    <a href="" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
										<span class="menu-link">
											<span class="menu-title">Link BIO</span>
										</span>
									</a>
									<a href="" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
										<span class="menu-link">
											<span class="menu-title">Blog</span>
										</span>
									</a>
									<a href="" class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
										<span class="menu-link">
											<span class="menu-title">Event</span>
										</span>
									</a>
								</div>
							</div>
							<div class="app-navbar flex-shrink-0">
								<div class="app-navbar-item ms-1 ms-lg-5">
									<div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom">
										<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
										<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
									</div>
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-night-day fs-2"></i>
												</span>
												<span class="menu-title">Light</span>
											</a>
										</div>
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-moon fs-2"></i>
												</span>
												<span class="menu-title">Dark</span>
											</a>
										</div>
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-outline ki-screen fs-2"></i>
												</span>
												<span class="menu-title">System</span>
											</a>
										</div>
									</div>
								</div>
                                @guest
                                 <div class=" d-flex  align-items-center">
                                 </div>
                                    <div class="app-navbar-item  ms-1 ms-lg-5">
                                        <a href="{{ route('register') }}" class="btn btn-light-warning d-md-block d-none btn-hover-success">
                                            Daftar
                                        </a>
                                    </div>    
                                    @if (Route::has('register'))
                                        <div class="app-navbar-item ms-1 ms-lg-5">
                                            <a href="{{ route('login') }}" class="btn btn-light-success" >
                                                Masuk
                                            </a>
                                        </div>  
                                    @endif
                                @else
                                    <div class="app-navbar-item ms-1 ms-lg-5">
                                        <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom">
                                            <i class="ki-outline ki-notification-on fs-1"></i>
                                        </div>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
                                            <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ asset('assets/media/misc/menu-header-bg.jpg') }}')">
                                                <h3 class="text-white fw-semibold px-9 mt-10 mb-6">Notifications</h3>
                                            </div>
                                            <div class="scroll-y mh-325px my-5 px-8">
                                                <div class="d-flex flex-stack py-4">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-35px me-4">
                                                            <span class="symbol-label bg-light-primary">
                                                                <i class="ki-outline ki-abstract-28 fs-2 text-primary"></i>
                                                            </span>
                                                        </div>
                                                        <div class="mb-0 me-2">
                                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Alice</a>
                                                            <div class="text-gray-400 fs-7">Phase 1 development</div>
                                                        </div>
                                                    </div>
                                                    <span class="badge badge-light fs-8">1 hr</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="app-navbar-item ms-3 ms-lg-5" id="kt_header_user_menu_toggle">
                                        <div class="cursor-pointer symbol symbol-35px symbol-md-45px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                            <img class="symbol symbol-circle symbol-35px symbol-md-45px" src="assets/media/avatars/300-13.jpg" alt="user" />
                                        </div>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <div class="menu-content d-flex align-items-center px-3">
                                                    <div class="symbol symbol-50px me-5">
                                                        <img alt="Logo" src="assets/media/avatars/300-13.jpg" />
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }}</div>
                                                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="separator my-2"></div>
                                            <div class="menu-item px-5">
                                                <a href="{{route('dashboard')}}" class="menu-link px-5">Dashboard</a>
                                                <a href="{{route('setting')}}" class="menu-link px-5">Settings</a>
                                            </div>
                                            <div class="separator my-2"></div>
                                            <div class="menu-item px-5">
                                                <a href="{{ route('logout') }}" class="menu-link px-5">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                @endguest
							</div>
						</div>
					</div>
				</div>

                    @yield('content')

            </div>
        </div>
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-outline ki-arrow-up"></i>
        </div>

        <script>var hostUrl = "";</script>
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/contacts/edit-contact.js') }}"></script>
        <script>
            $("#kt_datatable_horizontal_scroll").DataTable({
    "scrollX": true
});
        </script>
    </body>
</html>
    
