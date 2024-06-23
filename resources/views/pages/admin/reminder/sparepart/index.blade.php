@extends('layouts.dashboard-master')

@section('title', 'Sparepart')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">List Sparepart</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">List Sparepart</span>
            <div class="d-flex">
                <button id="createNewSparepart" class="btn btn-success">Tambah Sparepart</button>
            </div>
        </div>
    </nav>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sparepart</th>
                        <th>Terahir Service</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th style="width: 200px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($sparepart as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->last_service }}</td>
                            <td>{{ $item->est_price }}</td>
                            <td>{{ $item->status_reminder }}</td>
                            <td>
                                <button class="btn btn-success editSparepart" data-id="{{ $item->id }}">Edit</button>
                                <button class="btn btn-danger deleteSparepart" data-id="{{ $item->id }}">Delete</button>
                                <button class="btn btn-info showSparepart" data-id="{{ $item->id }}">Show</button>
                                <button type="button" class="btn btn-info waves-effect waves-light"
                                    id="sa-params">contoh</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    @include('pages.admin.reminder.sparepart.modal-sparepart')

    <!-- Script -->
    @include('pages.admin.reminder.sparepart.script-table')

    <script>
        document.getElementById("sa-params").addEventListener("click", function() {
            Swal.fire({
                title: "Peringatan",
                text: "Sparepart Anda sudah waktunya pengecekan atau ganti.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Tunda",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ms-2 mt-2",
                buttonsStyling: false
            }).then(function(e) {
                if (e.value) {
                    // Redirect to another page
                    window.location.href =
                        "/dashboard/reminder-sparepart/edit"; // Ganti URL ini dengan URL yang sesuai
                } else if (e.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Tanggal dan Waktu untuk tunda:",
                        html: '<input type="datetime-local" id="datetime" class="swal2-input">',
                        confirmButtonText: "Simpan",
                        showCancelButton: true,
                        cancelButtonText: "Batal",
                        preConfirm: () => {
                            return document.getElementById('datetime').value;
                        }
                    }).then(function(e) {
                        if (e.value) {
                            Swal.fire({
                                title: "All done!",
                                confirmButtonColor: "#4a4fea",
                                html: "Your chosen date and time: <pre><code>" + e.value +
                                    "</code></pre>",
                                confirmButtonText: "OK"
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
