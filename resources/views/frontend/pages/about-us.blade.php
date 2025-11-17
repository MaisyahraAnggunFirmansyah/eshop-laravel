@extends('frontend.layouts.master')

@section('title', 'Azzahra Make Up || Tentang Kami')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Beranda<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">Tentang Kami</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- About Us -->
    <section class="about-us section">
        <div class="container">
            <div class="row">
                @php
                    $setting = DB::table('settings')->first();
                @endphp

                <div class="col-lg-6 col-12">
                    <div class="about-content">
                        <h3>Selamat Datang di <span style="color:#C97B84;">{{ env('APP_NAME', 'Azzahra Make Up') }}</span></h3>
                        
                        {{-- Deskripsi dari database --}}
                        {!! $setting->description ?? '
                        <p>
                        Azzahra Make Up adalah layanan profesional di bidang rias pengantin, penyewaan busana adat, dan dekorasi acara.
                        Kami hadir untuk membantu Anda mewujudkan momen berkesan dengan sentuhan keindahan dan pelayanan terbaik.
                        </p>' !!}

                        <div class="button mt-3">
                            <a href="{{ route('blog') }}" class="btn" style="background-color:#C97B84; color:white; border:none; border-radius:8px;">Lihat Artikel</a>
                            <a href="{{ route('contact') }}" class="btn primary" style="background-color:#B85C76; color:white; border:none; border-radius:8px;">Hubungi Kami</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="about-img overlay">
                        @if (!empty($setting->photo))
                            <img src="{{ asset($setting->photo) }}" alt="Tentang Kami">
                        @else
                            <img src="{{ asset('frontend/img/default.jpg') }}" alt="Default Image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->

    <!-- Start Shop Services Area -->
    <section class="shop-services section" style="background-color:#FDF6F8;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-face-smile"></i>
                        <h4>Rias Profesional</h4>
                        <p>Tampilan memukau di setiap momen spesial Anda.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-gift"></i>
                        <h4>Sewa Dekorasi & Busana</h4>
                        <p>Paket lengkap untuk acara Anda tanpa repot.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Pembayaran Aman</h4>
                        <p>Transaksi mudah & terjamin keamanannya.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service">
                        <i class="ti-heart"></i>
                        <h4>Kepuasan Pelanggan</h4>
                        <p>Pelayanan hangat & hasil yang memuaskan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services Area -->

    @include('frontend.layouts.newsletter')
@endsection
