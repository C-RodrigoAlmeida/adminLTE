@extends('layouts.auth')

@section('body-class', 'login-page')

@section('content')
    <div class="login-box">
    <div class="login-logo">
      <a href="{{ route('login') }}"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @session('status')
          <div class="alert alert-success" role="alert">
              {{ $value }}
          </div>
        @endsession
        <form action="{{ route('login') }}" method="post">
            @csrf
          <div class="input-group mb-3">
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            <input 
                type="email" 
                name="email"
                class="form-control @error('email') is-invalid @enderror" 
                placeholder="Email"
                value="{{ old('email') }}"
            />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror   
          </div>
          <div class="input-group mb-3">
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            <input 
                type="password"
                name="password"
                class="form-control"
                placeholder="Password" 
            />
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Sign In</button>
          </div>
        </form>
        <p class="mb-1 text-center"><a href="{{ route('password.request') }}">I forgot my password</a></p>
        <p class="mb-0 text-center">
          <a href="{{ route('register') }}" class="text-center"> Register a new membership </a>
        </p>     
      </div>
    </div>
  </div>
@endsection