@extends('layouts.dashboard-master')

@section('title', 'Komunitas')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Tambah Komunitas</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="name" class="form-label">Name Komunitas</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Nama Komunitas">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Deskripsi Komunitas</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Deskripsi Komunitas">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label"> Komunitas</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Deskripsi Komunitas">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection
