@extends('auth.base')
@section('content')
<div class="auth-form">
    <h4 class="text-center mb-4">Login Sebagai Mitra</h4>

        <form  method="POST" action="{{ route('login') }}">

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

        <button type="submit" class="btn btn-primary ">Log in</button>

        <div class="form-group">
            <p><small>No account yet? <a href="{{ route('mitra.register') }}">Sign up</a></small></p>
        </div>
        </form>
</div>
@endsection