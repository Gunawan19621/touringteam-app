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
                    <a href="{{ route('dashboard.group.area', $group->id) }}" class="nav-link ">
                        Area
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.group.pengaturan', $group->id) }}" class="nav-link active">
                        Pengaturan
                    </a>
                </li>
            </ul>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Pengaturan Group</h4>
                <div class="mb-2">
                    <div class="row">
                        <div class="col-6">
                            <label for="example-select" class="form-label">Status Group</label>
                            <select class="form-select" id="example-select">
                                <option disabled selected>Pilih salah satu</option>
                                <option>Publik</option>
                                <option>Private</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="example-select" class="form-label">Notifikasi</label>
                            <select class="form-select" id="example-select">
                                <option disabled selected>Pilih salah satu</option>
                                <option>Admin</option>
                                <option>Anggota</option>
                                <option>Semua</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </div>
    </div>
@endsection
