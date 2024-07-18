<div class="left-side-menu">
    <div class="h-100" data-simplebar>

        @php
            $active = $active ?? '';
        @endphp

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li class="{{ $active == 'dashboard' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="{{ $active == 'dashboard' ? 'active' : '' }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Menu</li>

                <li
                    class="{{ $active == 'groups' || $active == 'detailGroups' || $active == 'historyGroups' ? 'menuitem-active' : '' }}">
                    <a href="#touring" data-bs-toggle="collapse">
                        <i class="mdi mdi-map-marker-path"></i>
                        <span> Group Touring </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse {{ $active == 'groups' || $active == 'detailGroups' || $active == 'historyGroups' ? 'show' : '' }}"
                        id="touring">
                        <ul class="nav-second-level">
                            <li class="{{ $active == 'groups' || $active == 'detailGroups' ? 'menuitem-active' : '' }}">
                                <a href="{{ route('dashboard.group-touring.index') }}"
                                    class="{{ $active == 'groups' || $active == 'detailGroups' ? 'active' : '' }}">Group
                                    Touring</a>
                            </li>
                            <li class="{{ $active == 'historyGroups' ? 'menuitem-active' : '' }}">
                                <a href="{{ route('dashboard.history-group-touring.index') }}"
                                    class="{{ $active == 'historyGroups' ? 'active' : '' }}">History touring</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ $active == 'documents' || $active == 'sparepart' ? 'menuitem-active' : '' }}">
                    <a href="#reminder" data-bs-toggle="collapse">
                        <i class="mdi mdi-reminder"></i>
                        <span> Pengingat </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse {{ $active == 'documents' || $active == 'sparepart' ? 'show' : '' }}"
                        id="reminder">
                        <ul class="nav-second-level">
                            <li class="{{ $active == 'documents' ? 'menuitem-active' : '' }}">
                                <a href="{{ route('dashboard.document.index') }}"
                                    class="{{ $active == 'documents' ? 'active' : '' }}">Document Pengingat</a>
                            </li>
                            <li class="{{ $active == 'sparepart' ? 'menuitem-active' : '' }}">
                                <a href="{{ route('dashboard.sparepart.index') }}"
                                    class="{{ $active == 'sparepart' ? 'active' : '' }}">Sparepart Pengingat</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="{{ $active == 'transportation' ? 'menuitem-active' : '' }}">
                    <a href="{{ route('dashboard.transportation.index') }}"
                        class="{{ $active == 'transportation' ? 'active' : '' }}">
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

                <li class="{{ $active == 'm-user' || $active == 'm-role' ? 'menuitem-active' : '' }}">
                    <a href="#managemenuser" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-cog"></i>
                        <span> Managemen User </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse {{ $active == 'm-user' || $active == 'm-role' ? 'show' : '' }}"
                        id="managemenuser">
                        <ul class="nav-second-level">
                            <li class="{{ $active == 'm-user' ? 'menuitem-active' : '' }}">
                                <a href="{{ route('dashboard.user.index') }}"
                                    class="{{ $active == 'm-user' ? 'active' : '' }}">User</a>
                            </li>
                            <li class="{{ $active == 'm-role' ? 'menuitem-active' : '' }}">
                                <a href="{{ route('dashboard.role.index') }}"
                                    class="{{ $active == 'm-role' ? 'active' : '' }}">Role</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
