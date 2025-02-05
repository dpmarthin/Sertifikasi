@extends('layout.app')
@section('content')
    <div class="login-right">
        <div class="login-right-wrap">
            <h1>Register</h1>
            <p class="account-subtitle">Masukkan detail untuk membuat akun</p>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email <span class="login-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                </div>
                <div class="form-group">
                    <label>Password <span class="login-danger">*</span></label>
                    <input type="password" class="form-control pass-input  @error('password') is-invalid @enderror" name="password">
                    <span class="profile-views feather-eye toggle-password"></span>
                </div>
                <div class="form-group">
                    <label>Confirm password <span class="login-danger">*</span></label>
                    <input type="password" class="form-control pass-confirm @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                    <span class="profile-views feather-eye reg-toggle-password"></span>
                </div>               
                <div class="form-group mb-0">
                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection
