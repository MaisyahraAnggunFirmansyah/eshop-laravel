@extends('frontend.layouts.master')
@section('title', 'Azzahra Make Up || Beranda')
@section('main-content')

<!-- Banner Utama -->
<div style="position: relative;">
    <img src="{{ asset('frontend/img/banner.jpg') }}" 
         style="width: 100%; min-height: 100vh; object-fit: cover; opacity: 0.8;">
    <div style="position: absolute; top: 0; left: 0; 
                width: 100%; height: 100%; background: rgba(0,0,0,0.3);"></div>
    <div style="position: absolute; top: 45%; left: 10%; color: white;">
        <h1 style="font-size: 50px; font-weight: bold;">
            Selamat Datang di 
            <span style="color:#F7941D;">Azzahra Make Up</span>
        </h1>
        <p style="font-size:18px; max-width:600px; color:#dcdada;">
            Wujudkan penampilan impian Anda bersama layanan rias pengantin, busana adat, 
            dan dekorasi acara profesional kami.
        </p>
        <a class="btn btn-lg ws-btn" 
           href="{{ route('product-grids') }}" 
           style="background-color:#C97B84; color:white; border:none; padding:12px 25px; border-radius:8px;">
           Lihat Layanan
        </a>
    </div>
</div>

<!-- Layanan Populer Kami -->
<section class="product-area section bg-light">
    <div class="container">
        <div class="section-title text-center">
            <h2>Layanan Populer Kami</h2>
            <p>Temukan berbagai layanan unggulan dari Azzahra Make Up untuk setiap momen spesial Anda</p>
        </div>

        <div class="row">
            <!-- Rias Pengantin Akad & Resepsi -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-product text-center p-3 shadow-sm" 
                     style="background:white; border-radius:10px;">
                    <img src="{{ asset('frontend/img/rias-pengantin.jpeg') }}" 
                         alt="Rias Pengantin Akad & Resepsi" 
                         class="img-fluid mb-3" 
                         style="border-radius:10px; height:250px; object-fit:cover;">
                    <h4>Rias Pengantin Akad & Resepsi</h4>
                    <p>Paket make up dan busana lengkap untuk hari spesial Anda.</p>
                </div>
            </div>

            <!-- Rias Lamaran / Prewedding -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-product text-center p-3 shadow-sm" 
                     style="background:white; border-radius:10px;">
                    <img src="{{ asset('frontend/img/rias-wisuda.jpeg') }}" 
                         alt="Rias Lamaran / Prewedding" 
                         class="img-fluid mb-3" 
                         style="border-radius:10px; height:250px; object-fit:cover;">
                    <h4>Rias Lamaran / Prewedding</h4>
                    <p>Make up natural & elegan untuk sesi foto dan acara lamaran.</p>
                </div>
            </div>

            <!-- Rias Keluarga & Pagar Ayu -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-product text-center p-3 shadow-sm" 
                     style="background:white; border-radius:10px;">
                    <img src="{{ asset('frontend/img/rias-pagar-ayu.jpeg') }}" 
                         alt="Rias Keluarga & Pagar Ayu" 
                         class="img-fluid mb-3" 
                         style="border-radius:10px; height:250px; object-fit:cover;">
                    <h4>Rias Keluarga & Pagar Ayu</h4>
                    <p>Tampil kompak dan anggun dengan make up seragam keluarga.</p>
                </div>
            </div>

            <!-- Sewa Dekorasi Pelaminan -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-product text-center p-3 shadow-sm" 
                     style="background:white; border-radius:10px;">
                    <img src="{{ asset('frontend/img/dekorasi-pelaminan.jpeg') }}" 
                         alt="Sewa Dekorasi Pelaminan" 
                         class="img-fluid mb-3" 
                         style="border-radius:10px; height:250px; object-fit:cover;">
                    <h4>Sewa Dekorasi Pelaminan</h4>
                    <p>Dekorasi elegan sesuai tema acara — klasik, adat, hingga modern.</p>
                </div>
            </div>

            <!-- Sewa Busana Pengantin & Keluarga -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-product text-center p-3 shadow-sm" 
                     style="background:white; border-radius:10px;">
                    <img src="{{ asset('frontend/img/busana-pengantin.jpeg') }}" 
                         alt="Sewa Busana Pengantin & Keluarga" 
                         class="img-fluid mb-3" 
                         style="border-radius:10px; height:250px; object-fit:cover;">
                    <h4>Sewa Busana Pengantin & Keluarga</h4>
                    <p>Pilihan busana tradisional & modern untuk seluruh keluarga.</p>
                </div>
            </div>

            <!-- Paket Lengkap Wedding Organizer -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-product text-center p-3 shadow-sm" 
                     style="background:white; border-radius:10px;">
                    <img src="{{ asset('frontend/img/paket-lengkap.png') }}" 
                         alt="Paket Lengkap Wedding Organizer" 
                         class="img-fluid mb-3" 
                         style="border-radius:10px; height:250px; object-fit:cover;">
                    <h4>Paket Lengkap Wedding Organizer</h4>
                    <p>Paket hemat berisi rias, busana, dekorasi, dan dokumentasi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 🔹 Baju Adat & Baju Profesi -->
<div class="gallery mt-5">
            <h3 class="text-center text-purple mb-4">Baju Adat & Baju Profesi</h3>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <img src="{{ asset('frontend/img/baju-adat-anak1.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Hasil Rias 1">
                </div>
                <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <img src="{{ asset('frontend/img/baju-adat-anak2.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Hasil Rias 2">
                </div>
                <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <img src="{{ asset('frontend/img/baju-profesi1.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Hasil Rias 3">
                </div>
                <div class="col-lg-3 col-md-4 col-6 mb-3">
                    <img src="{{ asset('frontend/img/baju-profesi2.jpeg') }}" class="img-fluid rounded shadow-sm" alt="Hasil Rias 4">
                </div>
            </div>

@endsection
