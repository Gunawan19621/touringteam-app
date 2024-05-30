@extends('layouts.dashboard-master')

@section('title', 'Touring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Tambah Touring</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="name" class="form-label">Name Touring</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Nama Touring">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Deskripsi Touring</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Deskripsi Touring">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label"> Touring</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Deskripsi Touring">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection
