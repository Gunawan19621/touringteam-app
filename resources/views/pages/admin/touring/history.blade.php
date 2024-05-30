@extends('layouts.dashboard-master')

@section('title', 'Touring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Histori Touring</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">History Touring</span>
            <div class="d-flex">
                {{-- <a href="{{ url('/dashboard/touring/create') }}"
                    class="btn btn-purple rounded-pill w-md waves-effect waves-light mb-2">Tambah Touring</a> --}}
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
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection
