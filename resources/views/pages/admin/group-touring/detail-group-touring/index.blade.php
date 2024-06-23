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
                    {{-- <p class="text-muted"><i>Moto Group</i></p> --}}
                    <p class="font-13 mt-2">{{ $group->description }}</p>
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
                    <a href="javascript:void(0);" class="dropdown-item">Update Detail Group</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Update Anggota</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Update Kegiatan</a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item">Update Pengaturan</a>
                </div>
            </div>
            <h4 class="header-title mb-4">{{ $group->name }}</h4>

            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#detail" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        Detail Group
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#anggota" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        Anggota
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
                <div class="tab-pane show active" id="detail">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Detail Group</h4>
                            <form action="">
                                <div class="row mt-2">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Text</label>
                                            <input type="text" id="simpleinput" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Email</label>
                                            <input type="email" id="example-email" name="example-email"
                                                class="form-control" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Password</label>
                                            <input type="password" id="example-password" class="form-control"
                                                value="password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Show/Hide Password</label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" class="form-control"
                                                    placeholder="Enter your password">
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-palaceholder" class="form-label">Placeholder</label>
                                            <input type="text" id="example-palaceholder" class="form-control"
                                                placeholder="placeholder">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-textarea" class="form-label">Text area</label>
                                            <textarea class="form-control" id="example-textarea" rows="5"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-readonly" class="form-label">Readonly</label>
                                            <input type="text" id="example-readonly" class="form-control"
                                                readonly="" value="Readonly value">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-disable" class="form-label">Disabled</label>
                                            <input type="text" class="form-control" id="example-disable"
                                                disabled="" value="Disabled value">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-static" class="form-label">Static control</label>
                                            <input type="text" readonly class="form-control-plaintext"
                                                id="example-static" value="email@example.com">
                                        </div>
                                        <div>
                                            <label for="example-helping" class="form-label">Helping text</label>
                                            <input type="text" id="example-helping" class="form-control"
                                                placeholder="Helping text">
                                            <span class="help-block"><small>A block of help text that breaks onto a new
                                                    line and may extend beyond one line.</small></span>
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Input Select</label>
                                            <select class="form-select" id="example-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-multiselect" class="form-label">Multiple
                                                Select</label>
                                            <select id="example-multiselect" multiple class="form-select">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Default file
                                                input</label>
                                            <input type="file" id="example-fileinput" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-date" class="form-label">Date</label>
                                            <input class="form-control" id="example-date" type="date" name="date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-month" class="form-label">Month</label>
                                            <input class="form-control" id="example-month" type="month"
                                                name="month">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-time" class="form-label">Time</label>
                                            <input class="form-control" id="example-time" type="time" name="time">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-week" class="form-label">Week</label>
                                            <input class="form-control" id="example-week" type="week" name="week">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-number" class="form-label">Number</label>
                                            <input class="form-control" id="example-number" type="number"
                                                name="number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-color" class="form-label">Color</label>
                                            <input class="form-control" id="example-color" type="color" name="color"
                                                value="#71b6f9">
                                        </div>
                                        <div>
                                            <label for="example-range" class="form-label">Range</label>
                                            <input class="form-range" id="example-range" type="range" name="range"
                                                min="0" max="100">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                                    <img src="{{ asset('assets/images/users/user-2.jpg') }}"
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
                                                    <img src="{{ asset('assets/images/users/user-3.jpg') }}"
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
                                                    <img src="{{ asset('assets/images/users/user-4.jpg') }}"
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
                                                    <img src="{{ asset('assets/images/users/user-2.jpg') }}"
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
                                                    <img src="{{ asset('assets/images/users/user-3.jpg') }}"
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
                                                    <img src="{{ asset('assets/images/users/user-4.jpg') }}"
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

                <!-- Tab Pengaturan -->
                <div class="tab-pane" id="pengaturan">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Pengaturan Group</h4>
                            <div class="mb-2" id="pengaturan1">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label">Pengaturan 1</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check form-check-success">
                                            <input type="radio" name="radio" id="radio1" value="success"
                                                class="form-check-input" checked>
                                            <label for="radio1" class="form-label">
                                                Success
                                            </label>
                                        </div>
                                        <div class="form-check form-check-info">
                                            <input type="radio" name="radio" id="radio2" value="info"
                                                class="form-check-input">
                                            <label for="radio2" class="form-label">
                                                Info
                                            </label>
                                        </div>
                                        <div class="form-check form-check-warning">
                                            <input type="radio" name="radio" id="radio3" value="warning"
                                                class="form-check-input">
                                            <label for="radio3" class="form-label">
                                                Warning
                                            </label>
                                        </div>
                                        <div class="form-check form-check-danger">
                                            <input type="radio" name="radio" id="radio4" value="error"
                                                class="form-check-input">
                                            <label for="radio4" class="form-label">
                                                Error
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-4">
                                        <label class="form-label">Pengaturan 2</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check">
                                            <input id="checkbox1" type="checkbox" value="checked"
                                                class="form-check-input" />
                                            <label for="checkbox1" class="form-label">
                                                checkbox1
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input id="checkbox2" type="checkbox" value="checked"
                                                class="form-check-input" />
                                            <label for="checkbox2" class="form-label">
                                                checkbox2
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input id="checkbox3" type="checkbox" value="checked"
                                                class="form-check-input" />
                                            <label for="checkbox3" class="form-label">
                                                checkbox3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="form-label">Pengaturan 3</label>
                                        <i class="mdi mdi-alert-circle-outline" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Ini adalah sampel jika di kasih tooltip!"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1">
                                            <label class="form-check-label" for="customSwitch1">Toggle this switch
                                                element</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="example-select" class="form-label">Input Select</label>
                                    </div>
                                    <div class="col-8">
                                        <select class="form-select" id="example-select">
                                            <option disabled selected>Pilih salah satu</option>
                                            <option>satu</option>
                                            <option>dua</option>
                                            <option>tiga</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-primary waves-effect waves-light mb-1 me-1">Show
                                    Toast</button>
                                <button type="button"
                                    class="btn btn-danger waves-effect waves-light mb-1 me-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
