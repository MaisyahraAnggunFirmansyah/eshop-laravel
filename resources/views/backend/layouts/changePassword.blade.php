@extends('backend.layouts.master')

@section('main-content')

<style>
    /* ====== Tema Azzahra ====== */
    .azzahra-card {
        background: #fff;
        border-radius: 14px;
        border: 1px solid #f5d7db;
        box-shadow: 0 4px 10px rgba(201, 123, 132, 0.15);
        padding-bottom: 20px;
    }

    .azzahra-header {
        background: #C97B84;
        color: white;
        padding: 16px 20px;
        font-size: 18px;
        font-weight: 600;
        border-radius: 14px 14px 0 0;
    }

    .azzahra-btn {
        background: #C97B84 !important;
        border-color: #C97B84 !important;
        color: white !important;
        border-radius: 25px !important;
        padding: 6px 18px !important;
        font-weight: 500;
    }

    .azzahra-btn:hover {
        background: #b86c76 !important;
    }

    .form-label {
        font-weight: 600;
        color: #C97B84;
    }
</style>


<div class="azzahra-card shadow mb-4">

    <div class="azzahra-header">
        Ubah Kata Sandi
    </div>

    <div class="card-body">

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

        @include('backend.layouts.notification')

        <form method="POST" action="{{ route('change.password') }}">
            @csrf

            {{-- PASSWORD SAAT INI --}}
            <div class="form-group">
                <label class="form-label">Kata Sandi Saat Ini <span class="text-danger">*</span></label>
                <input type="password" name="current_password" class="form-control"
                       placeholder="Masukkan kata sandi saat ini">
            </div>

            {{-- PASSWORD BARU --}}
            <div class="form-group">
                <label class="form-label">Kata Sandi Baru <span class="text-danger">*</span></label>
                <input type="password" name="new_password" class="form-control"
                       placeholder="Masukkan kata sandi baru">
            </div>

            {{-- KONFIRMASI PASSWORD --}}
            <div class="form-group">
                <label class="form-label">Konfirmasi Kata Sandi Baru <span class="text-danger">*</span></label>
                <input type="password" name="new_confirm_password" class="form-control"
                       placeholder="Masukkan ulang kata sandi baru">
            </div>

            {{-- TOMBOL --}}
            <div class="form-group mt-4">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn azzahra-btn">Perbarui Kata Sandi</button>
            </div>

        </form>

    </div>
</div>

@endsection
