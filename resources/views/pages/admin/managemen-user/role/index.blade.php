@extends('layouts.dashboard-master')

@section('title', 'Role')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">List Role</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">List Role</span>
            <div class="d-flex">
                <button id="createNewRole" class="btn btn-success">Tambah Role</button>
            </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Role</th>
                        <th>Descripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr id="role_{{ $role->id }}">
                            <td>{{ $role->rolename }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <button class="btn btn-success editrole" data-id="{{ $role->id }}">Edit</button>
                                <button class="btn btn-danger deleterole" data-id="{{ $role->id }}">Delete</button>
                                <button class="btn btn-info showrole" data-id="{{ $role->id }}">Show</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.managemen-user.role.modal-user')

    @include('pages.admin.managemen-user.role.script-table')
    {{-- --}}

@endsection
