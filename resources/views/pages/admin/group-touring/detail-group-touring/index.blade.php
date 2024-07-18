@extends('layouts.dashboard-master')

@section('title', 'Detail Group Touring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('dashboard.group-touring.index') }}">Group Touring</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Group</li>
@endsection

@section('content')
    <div class="card">
        <div class="bg-picture card-body">
            <div class="d-flex align-items-top">

                <!-- avatar -->
                <img src="{{ asset('assets/images/users/profile.jpg') }}"
                    class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3" alt="profile-image"
                    style="width: 150px; height: 150px;">

                <!-- profile detail -->
                <div class="flex-grow-1 overflow-hidden">
                    <h4 class="m-0">{{ $group->name }}</h4>
                    <p class="font-13 mt-2">{{ $group->description }}</p>
                    <!-- social  -->
                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <i class="mdi mdi-18px mdi-account"></i>
                            <p class="d-inline-block">100</p>
                        </li>
                        <li class="list-inline-item">
                            <i class="mdi mdi-phone"></i>
                            <p class="d-inline-block">085159079010</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">{{ $group->name }}</h4>

            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="{{ route('dashboard.group-touring.show', $group->id) }}" class="nav-link active">
                        Detail Group
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.group.anggota', $group->id) }}" class="nav-link">
                        Anggota
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.group.area', $group->id) }}" class="nav-link">
                        Area
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard.group.pengaturan', $group->id) }}" class="nav-link">
                        Pengaturan
                    </a>
                </li>
            </ul>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Detail Group</h4>
                <form id="updateGroupForm">
                    <div class="mb-2">
                        <label for="name" class="form-label">Nama Group <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Masukan Nama Group"
                            value="{{ $group->name }}" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="description" class="form-label">Description Group</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Masukan Description Group"
                            rows="3">{{ $group->description }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" id="updateSaveBtn">Simpan</button>
                        <button type="button" class="btn btn-danger">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Leaflet Map Card -->
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Markers & Route</h4>
            <div id="map" style="height: 400px;"></div>
        </div>
    </div>

    <!-- Leaflet CSS (tautan alternatif) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Leaflet JavaScript (tautan alternatif) -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Leaflet Routing Machine (tautan alternatif) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js">
    </script>

    <script>
        const map = L.map('map').setView([-6.2692427, 106.6571369], 13);

        // Menambahkan layer tile dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Icon untuk marker merah
        let redIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        // Icon untuk marker biru
        let blueIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        // Marker pertama (merah)
        const marker1 = L.marker([-6.2692427, 106.6571369], {
            icon: redIcon
        }).addTo(map);

        // Marker kedua (biru)
        const marker2 = L.marker([-6.269615957186019, 106.65557048457276], {
            icon: blueIcon
        }).addTo(map);

        // Menggunakan Leaflet Routing Machine untuk menambahkan rute
        L.Routing.control({
            waypoints: [
                L.latLng(-6.2692427, 106.6571369), // Koordinat titik pertama
                L.latLng(-6.269615957186019, 106.65557048457276) // Koordinat titik kedua
            ],
            routeWhileDragging: true,
            lineOptions: {
                styles: [{
                    color: '#3388ff',
                    opacity: 0.7,
                    weight: 5
                }]
            },
            createMarker: function(i, waypoint, n) {
                // Gunakan ikon yang sesuai berdasarkan indeks waypoint
                let markerIcon = i === 0 ? redIcon : blueIcon;
                return L.marker(waypoint.latLng, {
                    icon: markerIcon
                });
            }
        }).addTo(map);
    </script>




    <!-- Script ajax -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Save edited Group
            $('#updateSaveBtn').click(function(e) {
                e.preventDefault();
                var group_id = "{{ $group->id }}";

                $.ajax({
                    data: $('#updateGroupForm').serialize(),
                    url: "{{ route('dashboard.detail-group.updateDetailGroup', ':id') }}".replace(
                        ':id', group_id),
                    type: "PUT",
                    dataType: 'json',
                    success: function(response) {
                        if (response.errors) {
                            let errorMessages = "<ul>";
                            $.each(response.errors, function(key, value) {
                                errorMessages += "<li>" + value + "</li>";
                            });
                            errorMessages += "</ul>";
                            Swal.fire({
                                title: "Error!",
                                html: errorMessages,
                                icon: "error",
                                confirmButtonColor: "#4a4fea",
                                confirmButtonText: "Coba Lagi"
                            });
                        } else {
                            handleResponse(response, "edit");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            title: "Error!",
                            text: "An error occurred. Please try again.",
                            icon: "error",
                            confirmButtonColor: "#d33",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });

            // Handle Response edit
            function handleResponse(response, action) {
                if (response.success) {
                    if (action === "edit") {
                        $('#updateGroupForm').trigger("reset");
                    }
                    Swal.fire({
                        title: "Success!",
                        text: response.success,
                        icon: "success",
                        confirmButtonColor: "#4a4fea",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        });
    </script>
@endsection
