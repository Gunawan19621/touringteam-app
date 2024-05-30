@extends('layouts.dashboard-master')

@section('title', 'Komunitas')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Data Komunitas</li>
@endsection

{{-- @section('content')
    <div class="row d-flex align-items-stretch" style="height: 100%; position: relative;">
        <!-- Cover Photo Section -->
        <div class="col-12" style="height: 35vh; position: relative;">
            <img src="{{ asset('assets/images/small/flower2.jpg') }}" class="img-fluid w-100" alt="cover-photo"
                style="height: 90%; object-fit: cover;">
        </div>

        <!-- Profile and Profile Settings Section -->
        <div class="row" style="margin-top: -10vh; z-index: 1; width: 100%;">
            <!-- Profile Section -->
            <div class="col-4" style="padding-left: 35px;"> <!-- tambahkan padding di sini -->
                <div class="card d-flex flex-column" style="height: calc(100vh - 25vh - 10px);">
                    <div class="text-center card-body" style="max-height: calc(100vh - 25vh - 10px); overflow-y: auto;">
                        <!-- Isi Profil -->
                        <img src="{{ asset('assets/images/users/profile-default.png') }}"
                            class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image"
                            style="width: 150px; height: 150px;">

                        <div class="text-start mt-2">
                            <p class="text-muted font-13">
                                <strong>Username :</strong> <span class="ms-2">Gunawan</span>
                            </p>
                            <p class="text-muted font-13">
                                <strong>Username :</strong> <span class="ms-2">Gunawan</span>
                            </p>
                            <p class="text-muted font-13">
                                <strong>Username :</strong> <span class="ms-2">Gunawan</span>
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <form id="uploadPhotoForm" action="" method="POST" enctype="multipart/form-data"
                                style="display:none;">
                                @csrf
                                <input type="file" name="profile_photo" accept="image/*" id="profilePhotoInput">
                            </form>
                            <button id="uploadPhotoButton"
                                class="btn btn-primary rounded-pill waves-effect waves-light me-2">
                                Upload Foto
                            </button>

                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill waves-effect waves-light">
                                    Hapus Foto
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Settings Section -->
            <div class="col-8" style=""> <!-- tambahkan padding di sini -->
                <div class="card d-flex flex-column" style="height: calc(100vh - 25vh - 10px);">
                    <div class="card-body">
                        <!-- Isi Pengaturan Profil -->
                        <ul class="nav nav-tabs nav-bordered">
                            <li class="nav-item">
                                <a href="#profile-b1" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Komunitas detail
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#password-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Komunitas Setting
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#member-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Member
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#invite-b1" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Invitation
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="profile-b1"
                                style="max-height: calc(100vh - 25vh - 80px); overflow-y: auto;">
                                <p>tab 1</p>
                            </div>

                            <div class="tab-pane" id="password-b1"
                                style="max-height: calc(100vh - 25vh - 80px); overflow-y: auto;">
                                <p>tab 2</p>
                            </div>

                            <div class="tab-pane" id="member-b1"
                                style="max-height: calc(100vh - 25vh - 80px); overflow-y: auto;">
                                <p>tab 3</p>
                            </div>

                            <div class="tab-pane" id="invite-b1"
                                style="max-height: calc(100vh - 25vh - 80px); overflow-y: auto;">
                                <p>tab 4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection --}}
@section('content')
    <style>
        .tab-pane {
            padding: 1rem;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .btn-buat-pengaduan {
            text-align: center;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent shadow-none">
                <div class="card-body bg-white">
                    <!-- Profil Komunitas Perumahan -->
                    <div class="card">
                        <div class="card-body bg-danger">
                            <div class="row bg-warning">
                                <div class="col-3 d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt=""
                                        class="rounded-circle img-thumbnail thumb-xl">
                                    <div class="online-circle"></div>
                                </div>
                                <div class="col-6 text-center text-white">
                                    <h3>Komunitas 1</h3>
                                    <p>mto 1</p>
                                    <hr class="col-9" style="border-color:#fff">
                                    <div class="d-flex justify-content-around">
                                        <span>
                                            <i class="mdi mdi-18px mdi-account"></i>
                                            <p class="d-inline-block">100</p>
                                        </span>
                                        <span>
                                            <i class="mdi mdi-home"></i>
                                            <p class="d-inline-block">100</p>
                                        </span>
                                        <span>
                                            <i class="mdi mdi-google-maps"></i>
                                            <p class="d-inline-block">jln ciwatu</p>
                                        </span>
                                        <span>
                                            <i class="mdi mdi-phone"></i>
                                            <p class="d-inline-block">123456789012</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-3 text-right d-flex justify-content-end align-items-end">
                                    <button type="button" class="btn bg-secondary-light  mr-2" data-toggle="modal"
                                        data-target="#editprofilModal"><i class="mdi mdi-lead-pencil"></i></button>
                                    <button type="Update" class="btn bg-secondary-light" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-cog-outline"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    Messages
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="home">
                                <p>Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                    parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                    pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                    arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                    dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                    elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
                                    porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            </div>
                            <div class="tab-pane show active" id="profile">
                                <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim
                                    justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu
                                    pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper
                                    nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                    consequat vitae, eleifend ac, enim.</p>
                                <p class="mb-0">Vakal text here dolor sit amet, consectetuer adipiscing elit.
                                    Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                    magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                                    ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis
                                    enim.</p>
                            </div>
                            <div class="tab-pane" id="messages">
                                <p>Vakal text here dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                    ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                    parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                    pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget,
                                    arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                    dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
                                    elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula,
                                    porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
