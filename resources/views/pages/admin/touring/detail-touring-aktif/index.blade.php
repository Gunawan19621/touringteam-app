@extends('layouts.dashboard-master')

@section('title', 'Touring(nama touring)')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item" aria-current="page">New Touring</li>
    <li class="breadcrumb-item active" aria-current="page">Detail Touring</li>
@endsection

{{-- @section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div id="gmaps-markers" class="gmaps" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps API -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA"></script>
    <!-- GMaps Plugin -->
    <script src="{{ asset('assets/libs/gmaps/gmaps.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = new GMaps({
                div: '#gmaps-markers',
                lat: -12.043333,
                lng: -77.028333
            });

            map.addMarker({
                lat: -12.043333,
                lng: -77.028333,
                title: 'Lima',
                click: function(e) {
                    alert('You clicked in this marker');
                }
            });
        });
    </script>
@endsection --}}
{{-- @section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div id="gmaps-route" class="gmaps" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps API -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA"></script>
    <!-- GMaps Plugin -->
    <script src="{{ asset('assets/libs/gmaps/gmaps.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = new GMaps({
                div: '#gmaps-route',
                lat: -12.043333,
                lng: -77.028333
            });

            var start = {
                lat: -12.043333,
                lng: -77.028333
            }; // Titik awal (contoh: Lima)
            var end = {
                lat: -12.046374,
                lng: -77.042793
            }; // Titik tujuan (contoh: tempat lain di Lima)

            map.addMarker({
                lat: start.lat,
                lng: start.lng,
                title: 'Start'
            });

            map.addMarker({
                lat: end.lat,
                lng: end.lng,
                title: 'End'
            });

            map.drawRoute({
                origin: [start.lat, start.lng],
                destination: [end.lat, end.lng],
                travelMode: 'driving',
                strokeColor: '#131540',
                strokeOpacity: 0.6,
                strokeWeight: 6
            });
        });
    </script>
@endsection --}}
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div id="map" class="gmaps" style="height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsucrEdmswqYrw0f6ej3bf4M4suDeRgNA"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {
                    lat: -12.043333,
                    lng: -77.028333
                }
            });

            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();

            directionsRenderer.setMap(map);

            var start = {
                lat: -12.043333,
                lng: -77.028333
            }; // Titik awal
            var end = {
                lat: -12.046374,
                lng: -77.042793
            }; // Titik tujuan

            var request = {
                origin: start,
                destination: end,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(result);
                } else {
                    alert('Directions request failed due to ' + status);
                }
            });
        });
    </script>
@endsection
