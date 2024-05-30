<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('assets/images/users/profile-default.png') }}"
                alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">{{ Auth::user()->fullname }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="{{ route('dashboard.profile.show') }}" class="dropdown-item notify-item">
                        <i class="far fa-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fas fa-cog me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fas fa-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="dropdown-item notify-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">Admin Head</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Menu</li>

                <li>
                    <a href="#community" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-group"></i>
                        <span> Komunitas </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="community">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('/dashboard/community/create') }}">Tambah Komunnitas</a>
                            </li>
                            <li>
                                <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                    Data Komunitas <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel4">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="{{ url('/dashboard/community') }}">Komunitas 1</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li>
                    <a href="#">
                        <i class="mdi mdi-map-marker-multiple"></i>
                        <span> Touring </span>
                    </a>
                </li> --}}
                <li>
                    <a href="#touring" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-group"></i>
                        <span> Touring </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="touring">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ url('/dashboard/touring') }}">Aktif Touring</a>
                            </li>
                            <li>
                                <a href="{{ url('/dashboard/touring/history') }}">History touring</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#email" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-group"></i>
                        <span> Member in group </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('member-group') }}">Group 1</a>
                            </li>
                            <li>
                                <a href="email-templates.html">Group 2</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#reminder" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-group"></i>
                        <span> Reminder </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="reminder">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('dashboard.reminder-document.index') }}">Document</a>
                            </li>
                            <li>
                                <a href="{{ url('/dashboard/reminder-sparepart') }}">Sparepart</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('chat') }}">
                        <i class="mdi mdi-forum-outline"></i>
                        <span> Chat </span>
                    </a>
                </li>

                <li class="menu-title mt-2">System</li>
                <li>
                    <a href="#managemenuser" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-group"></i>
                        <span> Managemen User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="managemenuser">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">User</a>
                            </li>
                            <li>
                                <a href="#">Role</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
