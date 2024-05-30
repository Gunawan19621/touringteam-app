@extends('layouts.dashboard-master')

@section('title', 'Touring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Data Touring</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">Data Touring</span>
            <div class="d-flex">
                <a href="{{ url('/dashboard/touring/create') }}"
                    class="btn btn-purple rounded-pill w-md waves-effect waves-light mb-2">Tambah Touring</a>
            </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 15; $i++)
                        <tr>
                            <td>Bruno Nash</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>38</td>
                            <td>2011/05/03</td>
                            <td style="width: 200px;">
                                <div class="button-list">
                                    <button type="button" class="btn btn-success waves-effect waves-light"><i
                                            class="mdi mdi-lead-pencil"></i></button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light"><i
                                            class="mdi mdi-delete"></i></button>
                                    <button type="button" class="btn btn-info waves-effect waves-light"
                                        onclick="window.location.href='{{ url('/dashboard/touring/detail') }}'"><i
                                            class="mdi mdi-eye"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
