@extends('layouts.dashboard-master')

@section('title', 'Member Group')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                                    data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Add
                                    Mamber</button>
                            </div>
                        </div><!-- end col-->
                        <div class="col-md-8">
                            <form class="d-flex flex-wrap align-items-center justify-content-sm-end">
                                <label for="status-select" class="me-2">Sort By</label>
                                <div class="me-sm-2">
                                    <select class="form-select my-1 my-md-0" id="status-select">
                                        <option selected="">All</option>
                                        <option value="1">Name</option>
                                        <option value="2">Post</option>
                                        <option value="3">Followers</option>
                                        <option value="4">Followings</option>
                                    </select>
                                </div>
                                <label for="inputPassword2" class="visually-hidden">Search</label>
                                <div>
                                    <input type="search" class="form-control my-1 my-md-0" id="inputPassword2"
                                        placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="text-center card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
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
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/users/user-10.jpg') }}"
                            class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type.
                        </p>

                        <div class="text-start">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">Johnathan
                                    Deo</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123
                                    1234</span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span
                                    class="ms-2">coderthemes@gmail.com</span></p>

                            <p class="text-muted font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                        </div>

                        <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light">Send
                            Message</button>
                    </div>
                </div>
            </div>


        </div> <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="text-center card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
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
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/users/user-9.jpg') }}"
                            class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type.
                        </p>

                        <div class="text-start">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">Johnathan
                                    Deo</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123
                                    1234</span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span
                                    class="ms-2">coderthemes@gmail.com</span></p>

                            <p class="text-muted font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                        </div>

                        <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light">Send
                            Message</button>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="text-center card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
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
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/users/user-8.jpg') }}"
                            class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type.
                        </p>

                        <div class="text-start">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">Johnathan
                                    Deo</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123
                                    1234</span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span
                                    class="ms-2">coderthemes@gmail.com</span></p>

                            <p class="text-muted font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                        </div>

                        <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light">Send
                            Message</button>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="text-center card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
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
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/users/user-7.jpg') }}"
                            class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type.
                        </p>

                        <div class="text-start">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">Johnathan
                                    Deo</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123
                                    1234</span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span
                                    class="ms-2">coderthemes@gmail.com</span></p>

                            <p class="text-muted font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                        </div>

                        <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light">Send
                            Message</button>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="text-center card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
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
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/users/user-6.jpg') }}"
                            class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type.
                        </p>

                        <div class="text-start">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">Johnathan
                                    Deo</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123
                                    1234</span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span
                                    class="ms-2">coderthemes@gmail.com</span></p>

                            <p class="text-muted font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                        </div>

                        <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light">Send
                            Message</button>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="text-center card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
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
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('assets/images/users/user-5.jpg') }}"
                            class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since
                            the 1500s, when an unknown printer took a galley of type.
                        </p>

                        <div class="text-start">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">Johnathan
                                    Deo</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123
                                    1234</span></p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span
                                    class="ms-2">coderthemes@gmail.com</span></p>

                            <p class="text-muted font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                        </div>

                        <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light">Send
                            Message</button>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
