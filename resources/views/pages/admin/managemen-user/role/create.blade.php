@extends('layouts.dashboard-master')

@section('title', 'User')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item" aria-current="page">List User</li>
    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
@endsection

@section('content')
    <p>Halaman Create User</p>
@endsection
