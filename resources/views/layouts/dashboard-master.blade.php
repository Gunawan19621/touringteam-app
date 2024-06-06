<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head-meta-title')
    @include('layouts.head-link')

    <!-- Style untuk loading screen menggunakan gif -->
    {{-- <style>
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
    </style> --}}

    <!-- Style untuk loading screen menggunakan 2 gambar -->
    <style>
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-container {
            position: relative;
            width: 125px;
            height: 125px;
        }

        .loading-container img {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .loading-container img:first-child {
            z-index: 1;
        }

        .loading-container img:last-child {
            animation: spin 2s linear infinite;
            z-index: 0;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid" data-topbar-color="light"
    data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='true'>

    <!-- Loading Screen menggunakan gif-->
    {{-- <div class="loading-screen" id="loading-screen">
        <img src="{{ asset('assets/images/logo-load/location-load.gif') }}" alt="Loading..."
            style="width: 125px; height: 125px;">
    </div> --}}

    <!-- Loading Screen 2 gambar yang lingkaran di putar pakai css-->
    <div class="loading-screen" id="loading-screen">
        <div class="loading-container">
            <img src="{{ asset('assets/images/logo-load/location.png') }}" alt="Loading...">
            <img src="{{ asset('assets/images/logo-load/lingkaran.png') }}" alt="Loading...">
        </div>
    </div>

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
            </div>

            <!-- Footer Start -->
            @include('layouts.footer')
        </div>

    </div>
    @include('layouts.script')
    <script>
        // Tampilkan loading screen saat halaman mulai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('loading-screen').style.display = 'flex';
        });

        // Sembunyikan loading screen setelah semua konten dimuat
        window.addEventListener('load', function() {
            document.getElementById('loading-screen').style.display = 'none';
        });

        // Tampilkan loading screen sebelum halaman di-reload
        window.addEventListener('beforeunload', function() {
            document.getElementById('loading-screen').style.display = 'flex';
        });
    </script>
</body>

</html>
