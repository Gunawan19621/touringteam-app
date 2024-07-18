@extends('layouts.dashboard-master')

@section('title', 'Detail Group Touring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.group-touring.index') }}">Group Touring</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Group</li>
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
                    <a href="{{ route('dashboard.group-touring.show', $group->id) }}" class="nav-link">
                        Detail Group
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.group.anggota', $group->id) }}" class="nav-link ">
                        Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.group.area', $group->id) }}" class="nav-link active">
                        Area
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.group.pengaturan', $group->id) }}" class="nav-link">
                        Pengaturan
                    </a>
                </li>
            </ul>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item">Terlarang</a>
                        <a href="javascript:void(0);" class="dropdown-item">diperbolehkan</a>

                    </div>
                </div>
                <h4 class="mb-4 header-title">Area tidak boleh di kunjungin dan boleh di kunjungin</h4>
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Area</th>
                            <th>Type</th>
                            <th>Sort</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($area as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $items->name }}</td>
                                <td>
                                    @if ($items->type == 'terlarang')
                                        <span class="badge bg-danger">Terlarang</span>
                                    @else
                                        <span class="badge bg-success">diperbolehkan</span>
                                    @endif
                                </td>
                                <td>{{ $items->sort }}</td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align: center;">Tidak ada data area</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
