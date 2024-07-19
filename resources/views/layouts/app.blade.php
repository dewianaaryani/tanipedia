<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tani Pedia</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('style/index.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    @yield('style')
  </head>
  <body>
      <div id="alertModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE876;</i>
                    </div>
                    <!-- Modal title if needed -->
                    <!-- <h4 class="modal-title">Modal Header</h4> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(session('alert'))
                        <h5 class="text-center">{{ session('alert') }}</h5>
                    @endif
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts._navbar')
    
    <main style="margin-top: 100px">
      @yield('content')
    </main>

    @include('layouts._footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
      const navbar = document.querySelector('.navbar')

      addEventListener('scroll', () => {
        if(window.pageYOffset > 60){
          navbar.classList.add('on-scroll')
        }else{
          navbar.classList.remove('on-scroll')
        }
      })
      
    </script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          @if(isset($village) && $village)
              var postcode = {{$village->post_code}};

              // Initialize the map and set its view to a default location (e.g., Jakarta)
              var map = L.map('map').setView([-6.2088, 106.8456], 13);

              // Add the tile layer from OpenStreetMap
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              // Use Nominatim to geocode the postcode and center the map accordingly
              var url = 'https://nominatim.openstreetmap.org/search?country=Indonesia&postalcode=' + postcode + '&format=json&limit=1';
              fetch(url)
                  .then(response => response.json())
                  .then(data => {
                      if (data.length > 0) {
                          var lat = data[0].lat;
                          var lon = data[0].lon;
                          map.setView([lat, lon], 20);

                          // Add a marker at the postcode's location
                          L.marker([lat, lon]).addTo(map)
                              .bindPopup("<b>" + postcode + "</b><br>{{ $village->name }}, Indonesia")
                              .openPopup();

                          // Optionally, add shapes or markers around the area
                          // Example: Adding a circle around the postcode's location
                          var circle = L.circle([lat, lon], {
                              color: 'red',
                              fillColor: '#f03',
                              fillOpacity: 0.5,
                              radius: 1000  // Adjust the radius as needed
                          }).addTo(map);
                      } else {
                          console.error('Failed to fetch postcode data:', data);
                      }
                  })
                  .catch(error => {
                      console.error('Error fetching data:', error);
                  });

              // Add click event listener to open Google Maps with postcode
              map.on('click', function(e) {
                  var googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=' + e.latlng.lat + ',' + e.latlng.lng;
                  window.open(googleMapsUrl, '_blank');
              });
          @endif
      });
  </script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        @if(isset($farm) && $farm)
            // Get the latitude and longitude from Laravel
            var latitude = {{ $farm->lt }};
            var longitude = {{ $farm->ld }};

            // Initialize the map and set its view to the chosen geographical coordinates and a zoom level:
            var map = L.map('map_dot').setView([latitude, longitude], 13);

            // Add the tile layer from OpenStreetMap:
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Add a marker at the specified latitude and longitude:
            var marker = L.marker([latitude, longitude]).addTo(map);
            marker.bindPopup("<b>Hello!</b><br>Disini Lokasiku.").openPopup();

            // Add click event listener to the marker
            marker.on('click', function(e) {
                var googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=' + latitude + ',' + longitude;
                window.open(googleMapsUrl, '_blank');
            });
        @endif
      });
  </script>
  <script>
      $(document).ready(function(){
          // Show the modal if there are any alerts or errors
          @if(session('alert') || $errors->any())
              $("#alertModal").modal('show');
          @endif
          
          // Close modal when OK button is clicked
          $("#alertModal .btn-success").click(function(){
              $("#alertModal").modal('hide');
          });
      });
  </script>
    
    @yield('script')
  </body>
</html>