
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="/CoolAdmin/css/font-face.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/libs/css/style.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    @yield('css')
    <link href="/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/CoolAdmin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/CoolAdmin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="/CoolAdmin/images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
                            </ul>
                        </li>
                            <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                            <a class="nav-link" href="{{url('/admin')}}" aria-expanded="false" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" aria-expanded="false" aria-controls="submenu-2"><i class="fas fa-user mr-2" style="color:aqua"></i></i>User</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/customer')}}" aria-expanded="false" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Kustomer</a>

                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{url('admin/category')}}" aria-expanded="false" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie" ></i>Kategori</a>

                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('admin/product')}}"  aria-expanded="false"  aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms" style="color: lightcoral"></i>Produk</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/stokmasuk')}}" aria-expanded="false" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Stok Masuk</a>

                            </li>
                            </ul>
                        </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="/CoolAdmin/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
                            </ul>
                        </li>
                      <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                            <a class="nav-link" href="{{url('/admin')}}" aria-expanded="false" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" aria-expanded="false" aria-controls="submenu-2"><i class="fas fa-user mr-2" style="color:aqua"></i></i>User</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/customer')}}" aria-expanded="false" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Kustomer</a>

                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{url('admin/category')}}" aria-expanded="false" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie" ></i>Kategori</a>

                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('admin/product')}}"  aria-expanded="false"  aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms" style="color: lightcoral"></i>Produk</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/stokmasuk')}}" aria-expanded="false" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Stok Masuk</a>

                            </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">

                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">

                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/CoolAdmin/images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/CoolAdmin/images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">

                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/CoolAdmin/images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/CoolAdmin/images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="/CoolAdmin/images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="/CoolAdmin/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                        <a class="js-acc-btn" href="#">{{Auth::user()->email}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="/CoolAdmin/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{Auth::user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                 </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                             @csrf
                                             </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @yield ('content')
                    </div>
                </div>
            </div>
                                    <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/CoolAdmin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/CoolAdmin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/CoolAdmin/vendor/slick/slick.min.js">
    </script>
    <script src="/CoolAdmin/vendor/wow/wow.min.js"></script>
    <script src="/CoolAdmin/vendor/animsition/animsition.min.js"></script>
    <script src="/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/CoolAdmin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/CoolAdmin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/CoolAdmin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/CoolAdmin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/CoolAdmin/vendor/select2/select2.min.js">
    </script>
    <!-- Main JS-->
    <script src="/CoolAdmin/js/main.js"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    @yield('js')
</body>
</html>
<!-- end document-->
