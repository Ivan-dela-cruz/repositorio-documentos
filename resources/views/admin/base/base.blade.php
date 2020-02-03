<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> @yield('title')</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="http://www.urbanui.com/"/>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}"/>


    <link rel="stylesheet" href="{{asset('vendors/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/simplemde/simplemde.min.css')}}">


    @yield('css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('images/logo.svg')}}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('images/logo-mini.svg')}}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-left">
                <li class="nav-item d-none d-lg-block">
                    <a href="#" class="nav-link"><p>Ventas</p></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a href="#" class="nav-link"><p>Compras</p></a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a href="#" class="nav-link"><p>Mi estado</p></a>
                </li>
            </ul>


            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Type to search" aria-label="search"
                               aria-describedby="search">
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                       id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline mx-0"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                         aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notificaciones</p>

                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Configuraciones</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Mensaje privados
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-account-box mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Nuevo usuario</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 dias
                                </p>
                            </div>
                        </a>
                    </div>
                </li>

            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    @include('admin.base.settings')

    <!-- partial -->


        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-profile">
                <div class="d-flex align-items-center justify-content-between">

                    @guest()
                        <img src="{{asset('images/faces/face5.jpg')}}" alt="profile">
                        <div class="profile-desc">
                            <p class="name mb-0">

                                <a class="name mb-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false" v-pre>
                                    S/N <span class="caret"></span>
                                </a>
                            </p>
                            <p class="designation mb-0">S/N</p>
                        </div>

                    @else
                        <img src="{{Auth::user()->image}}" alt="profile">
                        <div class="profile-desc">
                            <p class="name mb-0">

                                <a class="name mb-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            </p>
                            <p class="designation mb-0">{{Auth::user()->gender }}</p>
                        </div>
                    @endguest

                </div>
            </div>
            @include('admin.base.navbar')
        </nav>


        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">


                @yield('navigation')


                @yield('content')

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
        @include('admin.base.footer')

        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('js/off-canvas.js')}}"></script>
<script src="{{asset('js/hoverable-collapse.js')}}"></script>
<script src="{{asset('js/template.js')}}"></script>
<script src="{{asset('js/settings.js')}}"></script>
<script src="{{asset('js/todolist.js')}}"></script>
<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>


<script src="{{asset('vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('js/file-upload.js')}}"></script>
<script src="{{asset('js/typeahead.js')}}"></script>
<script src="{{asset('js/select2.js')}}"></script>


<script src="{{asset('vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('vendors/quill/quill.min.js')}}"></script>
<script src="{{asset('vendors/simplemde/simplemde.min.js')}}"></script>
<script src="{{asset('js/editorDemo.js')}}"></script>



@yield('script')
</body>


<!-- Mirrored from www.urbanui.com/datavizui/template/demo/vertical-default-light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Aug 2019 21:13:59 GMT -->
</html>

