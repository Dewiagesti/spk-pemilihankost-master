@extends('layouts.app')
@section('content')
<div class="untree_co-section bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-6">
          <h2 class="text-secondary heading-2">Register Seabagai Pencari Kost</h2>
          <p>Silahkan Registrasi terlebih dahulu.</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-5 bg-white p-5">
          <form class="contact-form" data-aos="fade-up" data-aos-delay="200" method="POST" action="{{ route('register') }}">
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
                <input type="text" 
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
                <label>Alamat</label>
                 <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" :value="old('alamat')" required></textarea>
                 @error('alamat')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-4">Register</button>

            <div class="form-group">
              <p><small>Apakah sudah punya akun? <a href="{{ route('login') }}">Login</a></small></p>
            </div>
          </form>
        </div> <!-- /.col-lg-7 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </div> <!-- /.untree_co-section bg-light -->
  
@endsection