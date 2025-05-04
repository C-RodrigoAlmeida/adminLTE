@extends('layouts.default')
@section('page-title', 'Adicionar Usuário')
@section('content')
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Full name</label>
        <input 
            type="text" 
            class="form-control @error('name') is-invalid @enderror" 
            name="name"
            value="{{ old('name') }}"
            placeholder="Enter a full name"
        >   
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input 
            type="email" 
            class="form-control @error('email') is-invalid @enderror" 
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter a email address"
        >   
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

        <div class="form-group">
        <label for="password">Password</label>
        <input 
            type="password" 
            class="form-control @error('password') is-invalid @enderror" 
            name="password"
            placeholder="Enter a password"
        >   
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection