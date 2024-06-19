@extends('layouts.dashboard-master')

@section('title', 'Kendaraan')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">List Kendaraan</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">List Kendaraan</span>
            <div class="d-flex">
                <button id="createNewKendaraan" class="btn btn-success">Tambah Kendaraan</button>
            </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive" data-pattern="priority-columns">
                <table id="datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Tipe Kendaraan</th>
                            <th>Jenis Kendaraan</th>
                            <th>Nama Kendaraan</th>
                            <th>Descripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($transportation as $items)
                            <tr id="transportation_{{ $items->id }}">
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if ($items->foto_kendaraan)
                                        <img src="{{ asset('uploads/kendaraan/' . $items->foto_kendaraan) }}"
                                            alt="Foto Kendaraan" style="width: 100px; height: auto;">
                                    @else
                                        <p class="text-center" style="font-size: 20px;">-</p>
                                    @endif
                                </td>
                                <td>{{ $items->type }}</td>
                                <td>{{ $items->machine }}</td>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->description }}</td>
                                <td>
                                    <button class="btn btn-success editKendaraan"
                                        data-id="{{ $items->id }}">Edit</button>
                                    <button class="btn btn-danger deleteKendaraan"
                                        data-id="{{ $items->id }}">Delete</button>
                                    <button class="btn btn-info showKendaraan" data-id="{{ $items->id }}">Show</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.transportation.modal-transportation')

    @include('pages.admin.transportation.script-table')

@endsection
