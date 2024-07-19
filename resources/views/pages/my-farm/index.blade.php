@extends('layouts.app')

@section('content')
    <section class="my-farm my-5 py-5">
        <div class="container">
            @if($farm == null)
                @include('pages.my-farm._not-registered')                
                
            @else
                @include('pages.my-farm._registered')

                
            @endif
        </div>
        
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#successModal').modal('show');
        });
    </script>
    <script>
        @if($farm)
            var farmLat = {{ $farm->lt }};
            var farmLng = {{ $farm->ld }};
        @else
            // Use the exact latitude and longitude from the provided Google Maps link
            var farmLat = -6.6317479;
            var farmLng = 106.826552;
        @endif
    
        // Initialize the map and set its view to the farm's location
        var map = L.map('map-farm').setView([farmLat, farmLng], 18); // Higher zoom level for accuracy
    
        // Add the OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        // Add a marker at the farm's location
        var marker = L.marker([farmLat, farmLng]).addTo(map)
            .bindPopup('<b>Farm Location</b><br>Lat: ' + farmLat.toFixed(7) + '<br>Lng: ' + farmLng.toFixed(7))
            .openPopup();
    
        // Add click event listener to redirect to Google Maps
        map.on('click', function() {
            var gmapsUrl = `https://www.google.com/maps?q=${farmLat},${farmLng}`;
            window.open(gmapsUrl, '_blank');
        });
    </script>
    
@endsection
