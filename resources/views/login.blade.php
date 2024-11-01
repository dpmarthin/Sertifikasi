@extends('layout.app')
@section('content')

<div class="login-right">
    <div class="login-right-wrap">
        <h1>Welcome to Login</h1>
        <h2>Log in</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('loginsubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email<span class="login-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                <span class="profile-views"><i class="fas fa-envelope"></i></span>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password <span class="login-danger">*</span></label>
                <input type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password">
                <span class="profile-views feather-eye toggle-password"></span>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
