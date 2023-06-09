
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

        <!-- Datatable -->
        <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<style>
    #map { height: 600px; }
</style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                @if(Auth::user()->role == 1)
                <li class="nav-label">Admin</li>
                @else
                <li class="nav-label">Mitra</li>
                @endif

            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <!--**********************************
            Header start
        ***********************************-->
       @include('admin.layouts.components.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.layouts.components.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <div class="content-body">
            <div class="container-fluid">
                {{-- <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                        </ol>
                    </div>
                </div> --}}
                <div class="row">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2023</p>
            </div>
        </div>


    </div>

    <!-- Required vendors -->
    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>

    <script src="{{ asset('admin/vendor/highlightjs/highlight.pack.min.js') }}"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <script>
        var saldo_awal = document.getElementById("price_kost");
        saldo_awal.value = formatRupiah(saldo_awal.value);
        saldo_awal.addEventListener("keyup", function(e) {
            saldo_awal.value = formatRupiah(this.value);
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? rupiah : "";
        }
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
    @stack('scripts')
</body>

</html>
