@extends('layouts.dashboard-master')

@section('title', 'Detail Group Touring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Detail Group Touring</li>
@endsection

@section('content')
    <div class="card">
        <div class="bg-picture card-body">
            <div class="d-flex align-items-top">

                <!-- avatar -->
                <img src="{{ asset('assets/images/users/profile.jpg') }}"
                    class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3" alt="profile-image"
                    style="width: 150px; height: 150px;">

                <!-- profile detail -->
                <div class="flex-grow-1 overflow-hidden">
                    <h4 class="m-0">{{ $group->name }}</h4>
                    <p class="font-13 mt-2">{{ $group->description }}</p>
                    <!-- social  -->
                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <i class="mdi mdi-18px mdi-account"></i>
                            <p class="d-inline-block">100</p>
                        </li>
                        <li class="list-inline-item">
                            <i class="mdi mdi-phone"></i>
                            <p class="d-inline-block">085159079010</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">{{ $group->name }}</h4>

            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#detail" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        Detail Group
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#anggota" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#area" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        Area
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#pengaturan" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        Pengaturan
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Tab Detail -->
                <div class="tab-pane" id="detail">
                    @include('pages.admin.group-touring.detail-group-touring.detail-group')
                </div>

                <!-- Tab Anggota-->
                <div class="tab-pane show active" id="anggota">
                    {{-- @include('pages.admin.group-touring.detail-group-touring.detail-group') --}}
                    @include('pages.admin.group-touring.detail-group-touring.anggota-group')
                </div>

                <!-- Tab Anggota-->
                <div class="tab-pane" id="area">
                    @include('pages.admin.group-touring.detail-group-touring.area')
                </div>

                <!-- Tab Pengaturan -->
                <div class="tab-pane" id="pengaturan">
                    @include('pages.admin.group-touring.detail-group-touring.pengaturan-group')
                </div>
            </div>
        </div>
    </div>

    <script>
        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            // Inisialisasi DataTable di sini
            $('#datatable').DataTable().columns.adjust().draw();
        });
    </script>

    <!-- Script -->
    @include('pages.admin.group-touring.detail-group-touring.script')
@endsection
