@extends('layouts.dashboard-master')

@section('title', 'Group Touring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Group Touring</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">List Group Touring</span>
            <div class="d-flex">
                <button id="createNewGroup" class="btn btn-success">Tambah Group</button>
            </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Group</th>
                        <th>Jarak</th>
                        <th>Notifikasi</th>
                        <th>Descripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($groups as $group)
                        <tr id="group_{{ $group->id }}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $group->name }}</td>
                            <td>{{ $group->distance }}</td>
                            <td>{{ $group->send_notif }}</td>
                            <td>{{ $group->description }}</td>
                            <td>
                                <button class="btn btn-success editGroup" data-id="{{ $group->id }}">Edit</button>
                                <button class="btn btn-danger deleteGroup" data-id="{{ $group->id }}">Delete</button>
                                {{-- <a href="{{ route('dashboard.group-touring.show', $group->id) }}"
                                    class="btn btn-info">Show</a> --}}
                                <a href="{{ route('dashboard.detail-group.show', $group->id) }}"
                                    class="btn btn-info">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.group-touring.modal-group')

    <!-- Script -->
    @include('pages.admin.group-touring.script-table')
@endsection
