@extends('layouts.dashboard-master')

@section('title', 'Document')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item" aria-current="page">List Sparepart</li>
    <li class="breadcrumb-item active" aria-current="page">Edit Sparepart</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="name" class="form-label">Name Sparepart</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Nama Sparepart">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label">Deskripsi Sparepart</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Deskripsi Sparepart">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="name" class="form-label"> Sparepart</label>
                    <input type="text" id="name" name="name" class="form-control form-control-sm"
                        placeholder="Deskripsi Sparepart">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection
