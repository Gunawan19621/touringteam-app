@extends('layouts.dashboard-master')

@section('title', 'Histori Group')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Histori Touring</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">List Group Touring Yang sudah tidak aaktif</span>
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
                        <th>Status</th>
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
                            <td>{{ $group->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
