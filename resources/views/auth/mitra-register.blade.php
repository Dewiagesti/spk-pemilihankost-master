
@extends('auth.base')
@push('js')
    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            console.log("Latitude: " + latitude);
            console.log("Longitude: " + longitude);
            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;
        }
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


          <div class="form-group">
            <label class="text-black" for="no_hp">Longitude</label>
            <input type="text"
                id="longitude"
                type="number" name="longitude" required
                class="form-control @error('longitude') is-invalid @enderror" >
              @error('longitude')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>

        <div class="form-group">
            <label class="text-black" for="no_hp">Latitude</label>
            <input type="text"
                id="latitude"
                type="number" name="latitude" required
                class="form-control @error('latitude') is-invalid @enderror" >
              @error('latitude')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
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
