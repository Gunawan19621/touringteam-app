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
                    <a href="{{ route('dashboard.group.anggota', $group->id) }}" class="nav-link active">
                        Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.group.area', $group->id) }}" class="nav-link">
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
                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th> </th>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($group_members as $items)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('assets/images/users/user-3.jpg') }}"
                                        class="rounded-circle avatar-sm" alt="{{ $items->user->fullname }}">
                                </td>
                                <td>{{ $items->user->fullname }}</td>
                                <td>{{ $items->user->no_phone }}</td>
                                <td>
                                    @if ($items->status_lead == 'true')
                                        <span class="badge badge-soft-success">Admin</span>
                                    @else
                                        <strong>-</strong>
                                    @endif
                                </td>
                                <td>
                                    <button type="button"
                                        class="btn btn-{{ $items->status_lead == 'true' ? 'info' : 'success' }} btn-xs waves-effect waves-light update-status-lead"
                                        data-id="{{ $items->id }}"
                                        data-status_lead="{{ $items->status_lead == 'true' ? 'false' : 'true' }}">
                                        Jadikan {{ $items->status_lead == 'true' ? 'Anggota' : 'Admin' }}
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center;">Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.update-status-lead').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var status_lead = $(this).data('status_lead');

                $.ajax({
                    type: "PUT",
                    url: "{{ route('dashboard.detail-group.update', '') }}/" + id,
                    data: {
                        status_lead: status_lead
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Success!",
                                text: response.success,
                                icon: "success",
                                confirmButtonColor: "#4a4fea",
                                confirmButtonText: "OK"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: response.error,
                                icon: "error",
                                confirmButtonColor: "#4a4fea",
                                confirmButtonText: "Coba Lagi"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Error!",
                            text: "Ada kesalahan. Silakan coba lagi.",
                            icon: "error",
                            confirmButtonColor: "#4a4fea",
                            confirmButtonText: "Coba Lagi"
                        });
                    }
                });
            });
        });
    </script>
@endsection
