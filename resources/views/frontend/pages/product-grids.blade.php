@extends('frontend.layouts.master')

@section('title','Azzahra Make Up || Layanan')

@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('home') }}">Beranda<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="#">Layanan</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->


<section class="shop section">
    <div class="container">

        <!-- Judul Halaman -->
        <div class="section-title text-center mb-5">
            <h2 class="text-purple">✨ Layanan Azzahra Make Up & Dekorasi ✨</h2>
            <p>Pilih jenis layanan yang Anda butuhkan. Kami menyediakan jasa rias, dekorasi acara, serta sewa perlengkapan.</p>
        </div>


        <!-- ========================= -->
        <!-- KATEGORI 1: LAYANAN RIAS -->
        <!-- ========================= -->
        <h3 class="text-center text-purple mb-4">💄 Layanan Rias</h3>
        <div class="row justify-content-center">

            <!-- Rias Pengantin -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/rias pengantin.jpeg') }}" class="img-fluid" alt="">
                    <div class="service-content">
                        <h3>Rias Pengantin</h3>
                        <p>Make up elegan untuk akad, resepsi dan adat.</p>
                        <ul>
                            <li>💍 Akad & Resepsi</li>
                            <li>👘 Adat Tradisional</li>
                            <li>💄 Modern</li>
                        </ul>
                        <a class="btn-service" href="{{ route('product-detail','rias-pengantin') }}" target="_blank">Lihat Detail Paket</a>
                    </div>
                </div>
            </div>

            <!-- Rias Keluarga -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/rias pagar ayu.jpeg') }}" class="img-fluid" alt="">
                    <div class="service-content">
                        <h3>Rias Keluarga / Pagar Ayu</h3>
                        <p>Rias natural dan serasi untuk keluarga & pendamping.</p>
                        <ul>
                            <li>👩‍🦰 Ibu & Saudara</li>
                            <li>👗 Pagar Ayu</li>
                            <li>💅 Touch Up</li>
                        </ul>
                        <a class="btn-service" href="{{ route('product-detail','rias-keluarga') }}" target="_blank">Lihat Detail Paket</a>
                    </div>
                </div>
            </div>

            <!-- Rias Wisuda -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/rias wisuda.jpeg') }}" class="img-fluid" alt="">
                    <div class="service-content">
                        <h3>Rias Wisuda / Lamaran / Prewedding</h3>
                        <p>Tampilan flawless dan glowing.</p>
                        <ul>
                            <li>🎓 Wisuda</li>
                            <li>💍 Lamaran</li>
                            <li>📸 Prewedding</li>
                        </ul>
                        <a class="btn-service" href="{{ route('product-detail','rias-wisuda') }}" target="_blank">Lihat Detail Paket</a>
                    </div>
                </div>
            </div>

        </div>



        <!-- =============================== -->
        <!-- KATEGORI 2: DEKORASI ACARA -->
        <!-- =============================== -->
        <h3 class="text-center text-purple mt-5 mb-4">🎉 Layanan Dekorasi Acara</h3>
        <div class="row justify-content-center">

            <!-- Dekorasi Pelaminan -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/dekor-pelaminan.jpg') }}" class="img-fluid" alt="">
                    <div class="service-content">
                        <h3>Dekorasi Pelaminan</h3>
                        <p>Dekorasi modern, rustic, atau tradisional.</p>
                        <a class="btn-service" href="{{ route('product-detail','dekorasi-pelaminan') }}">Lihat Paket</a>
                    </div>
                </div>
            </div>

            <!-- Backdrop ACara -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/backdrop.jpg') }}" class="img-fluid" alt="">
                    <div class="service-content">
                        <h3>Backdrop Acara</h3>
                        <p>Cocok untuk lamaran, ulang tahun, dan acara formal.</p>
                        <a class="btn-service" href="{{ route('product-detail','backdrop') }}">Lihat Paket</a>
                    </div>
                </div>
            </div>

            <!-- Dekorasi Meja Tamu -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/meja-tamu.jpg') }}" class="img-fluid" alt="">
                    <div class="service-content">
                        <h3>Dekorasi Meja Tamu</h3>
                        <p>Set meja tamu lengkap dengan ornamen dekoratif.</p>
                        <a class="btn-service" href="{{ route('product-detail','meja-tamu') }}">Lihat Paket</a>
                    </div>
                </div>
            </div>

        </div>



        <!-- ====================================== -->
        <!-- KATEGORI 3: SEWA PERLENGKAPAN ACARA -->
        <!-- ====================================== -->
        <h3 class="text-center text-purple mt-5 mb-4">📦 Sewa Perlengkapan Acara</h3>
        <div class="row justify-content-center">

            <!-- Sewa Kursi -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/sewa-kursi.jpg') }}" class="img-fluid">
                    <div class="service-content">
                        <h3>Sewa Kursi & Meja</h3>
                        <p>Sedia kursi futura, kayu, meja bundar, persegi.</p>
                        <a class="btn-service" href="{{ route('product-detail','sewa-kursi-meja') }}">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Sound System -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/sound-system.jpg') }}" class="img-fluid">
                    <div class="service-content">
                        <h3>Sound System</h3>
                        <p>Paket sound untuk acara kecil hingga wedding.</p>
                        <a class="btn-service" href="{{ route('product-detail','sound-system') }}">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <!-- Lighting -->
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="single-service-card">
                    <img src="{{ asset('frontend/img/lighting.jpg') }}" class="img-fluid">
                    <div class="service-content">
                        <h3>Lighting / Lampu Panggung</h3>
                        <p>Pencahayaan premium untuk panggung & pelaminan.</p>
                        <a class="btn-service" href="{{ route('product-detail','lighting') }}">Lihat Detail</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection


@push('styles')
<style>
/* Tetap menggunakan style kamu */
.text-purple { color: #6C3483; }

.single-service-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transition: 0.3s;
}
.single-service-card:hover {
    transform: translateY(-8px);
}

.single-service-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.service-content {
    padding: 20px;
    text-align: center;
}

.btn-service {
    background: #C97B84;
    color: #fff;
    padding: 10px 24px;
    border-radius: 30px;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
}
.btn-service:hover {
    background: #a25c63;
}
</style>
@endpush
