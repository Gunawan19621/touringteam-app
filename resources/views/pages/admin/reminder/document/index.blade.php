@extends('layouts.dashboard-master')

@section('title', 'Document')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">List Dokumen</li>
@endsection

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand h1">List Dokumen</span>
            <div class="d-flex">
                <a href="{{ route('dashboard.reminder-document.create') }}"
                    class="btn btn-purple rounded-pill w-md waves-effect waves-light mb-2">Tambah Dokumen</a>
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
                                    <button type="button" class="btn btn-info waves-effect waves-light"><i
                                            class="mdi mdi-eye"></i></button>
                                    <button type="button" class="btn btn-info waves-effect waves-light"
                                        id="sa-params">contoh</button>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById("sa-params").addEventListener("click", function() {
            Swal.fire({
                title: "Peringatan",
                text: "Dokumen anda sudah mau expaired, silahkan klik ya untuk perpanjang",
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
                        "/dashboard/reminder-document/edit"; // Ganti URL ini dengan URL yang sesuai
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
