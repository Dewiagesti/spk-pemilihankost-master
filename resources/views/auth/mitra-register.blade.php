
@extends('auth.base')
@push('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<style>
    #map { height: 600px; }
</style>
@endpush
@push('js')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <script>
        /* var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 10000,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map); */

        /* L.esri.basemapLayer('Oceans').addTo(map); */

        /* Hybrid: s,h;
        Satellite: s;
        Streets: m;
        Terrain: p; */

        var map = L.map('map').setView([-7.93699,113.812946], 13);
        var marker = L.marker([-7.93699,113.812946]).addTo(map);
        var circle = new L.circleMarker();

        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            minZoom: 10,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);


        /* var labelLatVal = document.getElementById('labelLatitude');
        var labelLongVal = document.getElementById('labelLongitude'); */

        var latVal = document.getElementById('latitude');
        var longVal = document.getElementById('longitude');

        map.on('click', function(e) {
            /* labelLatVal.innerHTML = e.latlng.lat;
            labelLongVal.innerHTML = e.latlng.lng; */

            latVal.value = e.latlng.lat;
            longVal.value = e.latlng.lng;

            map.removeLayer(marker)
            map.removeLayer(circle);

            marker = new L.Marker(e.latlng, {draggable:true});
            map.addLayer(marker);

            /* var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map); */
            /* alert("Lat, Lon : " + e.latlng.lat + ", " + e.latlng.lng); */
        });

        /* function setRadius(){
            var rad = document.getElementById('radius').value;

            map.removeLayer(circle);
            circle = new L.circle([latVal.value, longVal.value], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: rad
            }).addTo(map);
        } */


    </script>
@endpush
@section('content')
<div class="auth-form">
    <h4 class="text-center mb-4">Register Sebagai Mitra</h4>
    <form method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf

        <div class="form-group">
            <label class="text-black" for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
              <label class="text-black" for="email">Email address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

          <div class="form-group">
            <label class="text-black" for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
              <label class="text-black" for="password">Password Konfirmasi</label>
              <input type="password"
                          id="password_confirmation"
                          name="password_confirmation" required autocomplete="new-password"
                          class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
              @error('password_confirmation')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="form-group">
              <label class="text-black" for="no_hp">No Handphone</label>
              <input
                  id="no_hp"
                  type="number" name="no_hp" required
                  class="form-control @error('no_hp') is-invalid @enderror" >
                @error('no_hp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
          </div>
          <div class="row">
            <div class="col-6">
                <div class="form-group" hidden>
                    <label for="longitude" class="ml-1">Longitude :</label>
                    {{-- <p id="labelLongitude">-</p> --}}
                    <input type="text" id="longitude" class="form-control  @error('longitude') is-invalid @enderror" name="longitude" placeholder="longitude..." value="{{old('longitude')}}" readonly hidden>
                    @error('longitude')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group" hidden>
                    <label for="latitude" class="ml-1">Latitude :</label>
                    {{-- <p id="labelLatitude">-</p> --}}
                    <input type="text" id="latitude" class="form-control  @error('latitude') is-invalid @enderror" name="latitude" placeholder="Latitude..." value="{{old('latitude')}}" readonly hidden>
                    @error('latitude')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="location" class="ml-1">Pilih Lokasi :</label>
            <div id="map"></div>
        </div>

          <div class="form-group">
              <label>Alamat</label>
               <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" :value="old('alamat')" required></textarea>
               @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
          </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </form>
    <div class="new-account mt-3">
        <p>Apakah sudah punya akun? <a class="text-primary" href="{{ route('mitra.login') }}">Login</a></p>
    </div>
</div>
@endsection
