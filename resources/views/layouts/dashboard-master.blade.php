<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head-meta-title')
    @include('layouts.head-link')
</head>

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light"
    data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('layouts.topbar')

        <!-- Left Sidebar -->
        @include('layouts.sidebar')

        <!-- Start Page Content here -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">

                    <!-- Page-Title / breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @section('breadcrumb')
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            @show
                        </ol>
                    </nav>

                    <!-- Start Content-->
                    @yield('content')
                </div>
            </div> <!-- content -->

            <!-- Footer Start -->
            @include('layouts.footer')
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    @include('layouts.script')
</body>

</html>
