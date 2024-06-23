@extends('layouts.dashboard-master')

@section('title', 'Dokumen')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">List Dokumen</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">List Dokumen</span>
            <div class="d-flex">
                <button id="createNewDocument" class="btn btn-success">Tambah Dokumen</button>
            </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>Masa Berlaku</th>
                        <th>Durasi</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($documents as $document)
                        <tr id="document_{{ $document->id }}">
                            <td>{{ $no++ }}</td>
                            <td>{{ $document->name }}</td>
                            <td>{{ $document->expired }}</td>
                            <td>{{ $document->duration }} {{ $document->duration_type }}</td>
                            <td>{{ $document->description }}</td>
                            <td>
                                <button class="btn btn-success editDocument" data-id="{{ $document->id }}">Edit</button>
                                <button class="btn btn-danger deleteDocument" data-id="{{ $document->id }}">Delete</button>
                                <button class="btn btn-info showDocument" data-id="{{ $document->id }}">Show</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.reminder.document.modal-document')

    <!-- Script -->
    @include('pages.admin.reminder.document.script-table')

@endsection
