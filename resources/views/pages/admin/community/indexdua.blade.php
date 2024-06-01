@extends('layouts.dashboard-master')

@section('title', 'Komunitas')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Data Komunitas</li>
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
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop font-20" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                        </div>
                    </div>
                    <h4 class="m-0">Nama Komunitas 1</h4>
                    <p class="text-muted"><i>Moto Komunitas</i></p>
                    <p class="font-13">Ini adalah Deskripsi komunitas,has been the industry's standard dummy text
                        ever since the 1500s, when an unknown printer took a galley of type.Contrary to popular
                        belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
                        Latin literature it over 2000 years to popular belief Ipsum is not simplyrandom text.
                    </p>
                    <!-- social  -->
                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <i class="mdi mdi-18px mdi-account"></i>
                            <p class="d-inline-block">100</p>
                            {{-- <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i
                                    class="mdi mdi-facebook"></i></a> --}}
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
            <div class="dropdown float-end">
                <a href="#" class="dropdown-toggle arrow-none card-drop font-20" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                </div>
            </div>
            <h4 class="header-title mb-4">Data Komunitas 1</h4>

            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#detail" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        Detail Komunitas
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#anggota" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#kegiatan" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        Kegiatan
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
                    <p>Halaman Detail Komunitas</p>

                </div>

                <!-- Tab Anggota-->
                <div class="tab-pane" id="anggota">
                    <div class="card chat-list-card mb-xl-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Data Anggota</h4>
                                <div class="search-box chat-search-box ms-3">
                                    <input type="text" class="form-control" placeholder="Search..."
                                        style="width: 200px;">
                                    <i class="mdi mdi-magnify search-icon"></i>
                                </div>
                            </div>

                            <hr class="my-3">

                            <div class="">
                                <ul class="list-unstyled chat-list mb-0" style="max-height: 413px;" data-simplebar>
                                    <!-- List Anggota -->
                                    <li class="active">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 chat-user-img active align-self-center me-2">
                                                    <img src="assets/images/users/user-2.jpg"
                                                        class="rounded-circle avatar-sm" alt="">
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-14 mt-0 mb-1">Margaret Clayton</h5>
                                                    <p class="text-truncate mb-0">I've finished it! See you so...</p>
                                                </div>
                                                <div class="font-11">05 min</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="d-flex">
                                                <div
                                                    class="flex-shrink-0 chat-user-img active avatar-sm align-self-center me-2">
                                                    <span class="avatar-title rounded-circle bg-soft-success text-success">
                                                        <i class="mdi mdi-account"></i>
                                                    </span>
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-14 mt-0 mb-1">Jason Bent</h5>
                                                    <p class="text-truncate mb-0">Hey! there I'm available</p>
                                                </div>
                                                <div class="font-11">20 min</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="unread">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 chat-user-img align-self-center me-2">
                                                    <img src="assets/images/users/user-3.jpg"
                                                        class="rounded-circle avatar-sm" alt="">
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-14 mt-0 mb-1">Mark Nieto</h5>
                                                    <p class="text-truncate mb-0">This theme is awesome!</p>
                                                </div>
                                                <div class="font-11">32 min</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="unread">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 chat-user-img active align-self-center me-2">
                                                    <img src="assets/images/users/user-4.jpg"
                                                        class="rounded-circle avatar-sm" alt="">
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-14 mt-0 mb-1">Garret Sauer</h5>
                                                    <p class="text-truncate mb-0">Nice to meet you</p>
                                                </div>
                                                <div class="font-11">01 hr</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 chat-user-img active align-self-center me-2">
                                                    <img src="assets/images/users/user-2.jpg"
                                                        class="rounded-circle avatar-sm" alt="">
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-14 mt-0 mb-1">Margaret Clayton</h5>
                                                    <p class="text-truncate mb-0">I've finished it! See you so...</p>
                                                </div>
                                                <div class="font-11">05 min</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="d-flex">
                                                <div
                                                    class="flex-shrink-0 chat-user-img active avatar-sm align-self-center me-2">
                                                    <span class="avatar-title rounded-circle bg-soft-success text-success">
                                                        <i class="mdi mdi-account"></i>
                                                    </span>
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-14 mt-0 mb-1">Jason Bent</h5>
                                                    <p class="text-truncate mb-0">Hey! there I'm available</p>
                                                </div>
                                                <div class="font-11">20 min</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="unread">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 chat-user-img align-self-center me-2">
                                                    <img src="assets/images/users/user-3.jpg"
                                                        class="rounded-circle avatar-sm" alt="">
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-14 mt-0 mb-1">Mark Nieto</h5>
                                                    <p class="text-truncate mb-0">This theme is awesome!</p>
                                                </div>
                                                <div class="font-11">32 min</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="unread">
                                        <a href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 chat-user-img active align-self-center me-2">
                                                    <img src="assets/images/users/user-4.jpg"
                                                        class="rounded-circle avatar-sm" alt="">
                                                </div>

                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="text-truncate font-14 mt-0 mb-1">Garret Sauer</h5>
                                                    <p class="text-truncate mb-0">Nice to meet you</p>
                                                </div>
                                                <div class="font-11">01 hr</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Kegiatan -->
                <div class="tab-pane show active" id="kegiatan">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <button class="btn btn-lg font-16 btn-success w-100" id="btn-new-event"><i
                                            class="fa fa-plus me-1"></i> Create New</button>

                                    <div id="external-events">
                                        <br>
                                        <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                        <div class="external-event bg-primary" data-class="bg-primary">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>New Theme
                                            Release
                                        </div>
                                        <div class="external-event bg-pink" data-class="bg-pink">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>My Event
                                        </div>
                                        <div class="external-event bg-warning" data-class="bg-warning">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Meet manager
                                        </div>
                                        <div class="external-event bg-purple" data-class="bg-danger">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Create New
                                            theme
                                        </div>
                                    </div>

                                    <!-- checkbox -->
                                    <div class="form-check mt-3">
                                        <input type="checkbox" class="form-check-input" id="drop-remove">
                                        <label class="form-check-label" for="drop-remove">Remove after drop</label>
                                    </div>

                                </div> <!-- end col-->

                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">

                                            <div id="calendar"></div>

                                        </div> <!-- end card body-->
                                    </div> <!-- end card -->
                                </div> <!-- end col -->

                            </div>

                            <!-- Add New Event MODAL -->
                            <div class="modal fade" id="event-modal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <h5 class="modal-title" id="modal-title">Event</h5>
                                        </div>
                                        <div class="modal-body px-4 pb-4 pt-0">
                                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Event Name</label>
                                                            <input class="form-control" placeholder="Insert Event Name"
                                                                type="text" name="title" id="event-title"
                                                                required />
                                                            <div class="invalid-feedback">Please provide a valid event name
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Category</label>
                                                            <select class="form-select" name="category"
                                                                id="event-category" required>
                                                                <option value="bg-danger" selected>Danger</option>
                                                                <option value="bg-success">Success</option>
                                                                <option value="bg-primary">Primary</option>
                                                                <option value="bg-info">Info</option>
                                                                <option value="bg-dark">Dark</option>
                                                                <option value="bg-warning">Warning</option>
                                                            </select>
                                                            <div class="invalid-feedback">Please select a valid event
                                                                category
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6 col-4">
                                                        <button type="button" class="btn btn-danger"
                                                            id="btn-delete-event">Delete</button>
                                                    </div>
                                                    <div class="col-md-6 col-8 text-end">
                                                        <button type="button" class="btn btn-light me-1"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success"
                                                            id="btn-save-event">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> <!-- end modal-content-->
                                </div> <!-- end modal dialog-->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Pengaturan -->
                <div class="tab-pane" id="pengaturan">
                    <p>Halaman detail dari jadwal kegiatan</p>
                </div>
            </div>
        </div>
    </div>
@endsection
