<div class="left-side-menu">
    <div class="h-100" data-simplebar>

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
                                <a href="#sidebarCommunityData" data-bs-toggle="collapse">
                                    Data Komunitas <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCommunityData">
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

                <li>
                    <a href="#touring" data-bs-toggle="collapse">
                        <i class="mdi mdi-map-marker-path"></i>
                        <span> Group Touring </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="touring">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('dashboard.group-touring.index') }}">Aktif Touring</a>
                            </li>
                            <li>
                                <a href="#">History touring</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li>
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
                </li> --}}

                <li>
                    <a href="#reminder" data-bs-toggle="collapse">
                        <i class="mdi mdi-reminder"></i>
                        <span> Pengingat </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="reminder">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('dashboard.document.index') }}">Document Pengingat</a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.sparepart.index') }}">Sparepart Pengingat</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('dashboard.transportation.index') }}">
                        <i class="mdi mdi-garage"></i>
                        <span> Kendaraan </span>
                    </a>
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
                        <i class="mdi mdi-account-cog"></i>
                        <span> Managemen User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="managemenuser">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('dashboard.user.index') }}">User</a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.role.index') }}">Role</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
