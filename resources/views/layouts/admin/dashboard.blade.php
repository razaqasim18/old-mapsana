<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield('title')</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
        rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/font-awesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/magnific-popup/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/bootstrap-datepicker/css/datepicker3.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/select2/select2.css') }}" />

    <!-- Specific Page Vendor CSS -->
    @yield('style')

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/stylesheets/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/stylesheets/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin_assets/stylesheets/theme-custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('admin_assets/vendor/modernizr/modernizr.js') }}"></script>

    <!-- sweetalert -->
    <link rel="stylesheet" href="{{ asset('dist/sweetalert.css') }}">
    <script src="{{ asset('dist/sweetalert.js') }}"></script>
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('{{ asset('admin_assets/images/loading.gif') }}') 50% 50% no-repeat #f9f9f9;
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="{{ route('admin.dashboard') }}" class="logo">
                    <img src="{{ asset('admin_assets/images/logo.png') }}" height="35" alt="Porto Admin" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                    data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="{{ asset('admin_assets/images/!logged-user.jpg') }}" alt="Joseph Doe"
                                class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                            <span class="name">{{ Auth::guard('admin')->user()->name }}</span>
                            <span class="role">Administrator</span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="{{ route('admin.profile') }}"><i
                                        class="fa fa-user"></i> My Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="{{ route('admin.passwords') }}"><i
                                        class="fa fa-cog"></i> Change Password</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.logout') }}"role="menuitem" tabindex="-1"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title" style="color:#fff;">
                        Navigation
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
                        data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li
                                    class="nav-parent @if (getCurrentPrefix() == 'admin/category') nav-expanded nav-active @endif">
                                    <a>
                                        <i class="fa fa-th-list" aria-hidden="true"></i>
                                        <span>Category</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li @if (Route::current()->getName() == 'admin.category.add') class="nav-active" @endif>
                                            <a href="{{ route('admin.category.add') }}">
                                                Add Category
                                            </a>
                                        </li>
                                        <li @if (Route::current()->getName() == 'admin.category.list') class="nav-active" @endif>
                                            <a href="{{ route('admin.category.list') }}">
                                                List Category
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li
                                    class="nav-parent @if (getCurrentPrefix() == 'admin/user') nav-expanded nav-active @endif">
                                    <a>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span>User</span>
                                    </a>
                                    <ul class="nav nav-children">

                                        <li @if (Route::current()->getName() == 'admin.user.list') class="nav-active" @endif>
                                            <a href="{{ route('admin.user.list') }}">
                                                List User
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                <li
                                    class="nav-parent @if (getCurrentPrefix() == 'admin/doctor') nav-expanded nav-active @endif">
                                    <a>
                                        <i class="fa fa-stethoscope" aria-hidden="true"></i>
                                        <span>Doctor</span>
                                    </a>
                                    <ul class="nav nav-children">

                                        <li @if (Route::current()->getName() == 'admin.doctor.list') class="nav-active" @endif>
                                            <a href="{{ route('admin.doctor.list') }}">
                                                List Doctor
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <hr class="separator" />
                    </div>

                </div>

            </aside>
            <!-- end: sidebar -->

            {{-- main --}}
            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>Dashboard</h2>
                    <div class="right-wrapper pull-right" style="margin-left: 10px;">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li><span></span></li>
                        </ol>
                    </div>
                </header>

                <!-- start: page -->
                @yield('main')
                <!-- end: page -->
            </section>
        </div>


    </section>

    <!-- Vendor -->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

    <!-- Specific Page Vendor -->
    @yield('script')

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('admin_assets/javascripts/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('admin_assets/javascripts/theme.custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('admin_assets/javascripts/theme.init.js') }}"></script>

</body>

</html>
