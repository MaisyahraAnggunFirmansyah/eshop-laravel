@extends('frontend.layouts.master')

@section('title', 'Azzahra Make Up || Login Pengguna')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Login -->
    <section class="shop login section" style="background-color: #faf6f7;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form" style="background: #fff; padding: 40px; border-radius: 15px; box-shadow: 0 0 20px rgba(0,0,0,0.05);">
                        <h2 style="color: #B85C76; text-align:center;">Masuk ke Akun Anda</h2>
                        <p style="text-align:center; color: #666;">Login untuk memesan layanan rias, busana, dan dekorasi acara dengan mudah.</p>

                        <!-- Form -->
                        <form class="form" method="POST" action="{{ route('login.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email Anda<span>*</span></label>
                                        <input type="email" name="email" placeholder="Masukkan email" required value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Kata Sandi<span>*</span></label>
                                        <input type="password" name="password" placeholder="Masukkan kata sandi" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group login-btn" style="text-align: center;">
                                        <button class="btn btn-login" type="submit">Masuk</button>
                                        <a href="{{ route('register.form') }}" class="btn btn-register">Daftar</a>
                                    </div>

                                    <div class="text-center" style="margin-top: 10px;">
                                        <span style="color: #888;">atau masuk dengan:</span>
                                    </div>

                                    <div class="social-login" style="text-align: center; margin-top: 10px;">
                                        <a href="{{ route('login.redirect','facebook') }}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                                        <a href="{{ route('login.redirect','github') }}" class="btn btn-github"><i class="ti-github"></i></a>
                                        <a href="{{ route('login.redirect','google') }}" class="btn btn-google"><i class="ti-google"></i></a>
                                    </div>

                                    <div class="checkbox" style="margin-top: 15px;">
                                        <label><input type="checkbox" name="remember"> Ingat saya</label>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <a class="lost-pass" href="{{ route('password.request') }}" style="color: #C97B84;">Lupa kata sandi?</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Login -->
@endsection

@push('styles')
<style>
    .btn-login {
        background-color: #C97B84;
        color: #fff;
        border-radius: 25px;
        padding: 10px 30px;
        transition: 0.3s;
    }
    .btn-login:hover {
        background-color: #b8686f;
    }

    .btn-register {
        background-color: #B85C76;
        color: #fff;
        border-radius: 25px;
        padding: 10px 30px;
        transition: 0.3s;
    }
    .btn-register:hover {
        background-color: #580b92;
    }

    .btn-facebook {
        background: #39579A;
        color: white;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 5px;
    }
    .btn-github {
        background: #444;
        color: white;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 5px;
    }
    .btn-google {
        background: #ea4335;
        color: white;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 5px;
    }
</style>
@endpush
