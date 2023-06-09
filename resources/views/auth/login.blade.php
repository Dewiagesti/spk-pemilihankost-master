@extends('layouts.app')
@section('content')
<div class="untree_co-section bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-6">
          <h2 class="text-secondary heading-2">Login</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-5 bg-white p-5">
          <form class="contact-form" data-aos="fade-up" data-aos-delay="200" method="POST" action="{{ route('login') }}">
              @csrf
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

            

            <button type="submit" class="btn btn-primary mb-4">Login</button>

            <div class="form-group">
              <p><small>Apakah sudah punya akun? <a href="{{ route('register') }}">register</a></small></p>
            </div>
          </form>
        </div> <!-- /.col-lg-7 -->
      </div> <!-- /.row -->
    </div> <!-- /.container -->
  </div> <!-- /.untree_co-section bg-light -->
  
@endsection