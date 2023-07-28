<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('dashboard/assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-lg navbar-dark navbar-static d-flex justify-content-between ">
        <ul class="d-flex flex-1 d-lg-none">
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </ul>

        <ul class="collapse navbar-collapse order-2 order-lg-1" id="navbar-mobile">
            <h1>Medical Appoinment System</h1>
            {{-- <span class="badge badge-success my-3 my-lg-0 ml-lg-3">Online</span> --}}
        </ul>

        <ul class="navbar-nav flex-row order-1 order-lg-2 flex-1 flex-lg-0 justify-content-end align-items-center">
            <li class="nav-item nav-item-dropdown-lg dropdown dropdown-user h-100">
                <a href="#"
                    class="navbar-nav-link navbar-nav-link-toggler dropdown-toggle d-inline-flex align-items-center h-100"
                    data-toggle="dropdown">
                    {{-- <img src="{{asset('dashboard/global_assets/images/demo/users/face11.jpg')}}" class="rounded-pill mr-lg-2" height="34"
                        alt=""> --}}
                    <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('admin.users.index') }}" class="dropdown-item"><i class="icon-user-plus"></i> View
                        All Users</a>
                    <a href="{{ route('admin.patients.index') }}" class="dropdown-item"><i class="icon-user-minus"></i>
                        View All Patients</a>
                    </a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                            class="icon-switch2"></i> Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <!-- /main navbar -->


    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

            <!-- Sidebar content -->
            <div class="sidebar-content">
                <!-- Main navigation -->
                <div class="sidebar-section">
                    <ul class="nav nav-sidebar" data-nav-type="accordion">

                        @include('pages.layouts.conponents.nav')

                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Inner content -->
            <div class="content-inner">

                <!-- Page header -->
                <div class="page-header page-header-light">
                    
                    <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="{{ route('admin.dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                                    Home</a>
                                <span class="breadcrumb-item active">@yield('title')</span>
                            </div>

                            <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                        </div>

                        <div class="header-elements d-none">
                            <div class="breadcrumb justify-content-center">
                                <a href="#" class="breadcrumb-elements-item">
                                    Today Date : <?php echo date('M d'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- /content area -->


                <!-- Footer -->
                @include('pages.layouts.conponents.footer')
                <!-- /footer -->

            </div>
            <!-- /inner content -->

            @if (Session::has('message'))
                <p id="pnotify-solid-success" hidden>{{ Session::get('message') }}</p>
            @endif
            @if (Session::has('errors'))
                <p id="pnotify-solid-warning" hidden>{{ Session::get('errors')->first() }}</p>
            @endif
        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <!-- Core JS files -->
    <script src="{{ asset('dashboard/global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('dashboard/global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/sparklines.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/lines.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/areas.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/donuts.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/bars.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/progress.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/pies.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_charts/pages/dashboard/light/bullets.js') }}"></script>
    <!-- /theme JS files -->

    <script src="{{ asset('dashboard/global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_pages/datatables_extension_colvis.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/plugins/notifications/pnotify.min.js') }}"></script>
    <script src="{{ asset('dashboard/global_assets/js/demo_pages/extra_pnotify.js') }}"></script>
    <script src="{{ asset('dashboard/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Theme JS files -->
	<script src="{{ asset('dashboard/global_assets/js/plugins/ui/dragula.min.js') }}"></script>
	<script src="{{ asset('dashboard/global_assets/js/demo_pages/components_collapsible.js') }}"></script>
	<!-- /theme JS files -->
    
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script> --}}
    <script>
        $(document).ready(function() {
            $("#pnotify-solid-success").trigger('click');
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#pnotify-solid-warning").trigger('click');
        });
    </script>



    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                columnDefs: [{
                    type: 'nepali-numbers',
                    targets: 0
                }]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table2').DataTable({
                columnDefs: [{
                    type: 'nepali-numbers',
                    targets: 0
                }]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table3').DataTable({
                columnDefs: [{
                    type: 'nepali-numbers',
                    targets: 0
                }]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table_4').DataTable({
                columnDefs: [{
                    type: 'nepali-numbers',
                    targets: 0
                }]
            });
        });
    </script>

    @yield('custom-script')
</body>

</html>
