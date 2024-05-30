@extends('layouts.dashboard-master')

@section('title', 'Touring(nama touring)')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active" aria-current="page">Detail touring</li>
@endsection

@section('content')
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
@endsection
