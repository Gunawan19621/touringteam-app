@extends('layouts.dashboard-master')

@section('title', 'User')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">List User</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">List User</span>
            <div class="d-flex">
                <button id="createNewUser" class="btn btn-success">Tambah User</button>
            </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Kode Referal</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr id="user_{{ $user->id }}">
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->fullname }}</td>
                            <td>{{ $user->kode }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nophone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <button class="btn btn-success editUser" data-id="{{ $user->id }}">Edit</button>
                                <button class="btn btn-danger deleteUser" data-id="{{ $user->id }}">Delete</button>
                                <button class="btn btn-info showUser" data-id="{{ $user->id }}">Show</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    @include('pages.admin.managemen-user.m-user.modal-user')

    @include('pages.admin.managemen-user.m-user.script-table')

@endsection
