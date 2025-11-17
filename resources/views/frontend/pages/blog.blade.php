@extends('frontend.layouts.master')

@section('title', 'Azzahra Make Up || Galeri & Tips')

@section('main-content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="bread-list">
                    <li><a href="{{ route('home') }}">Beranda <i class="ti-arrow-right"></i></a></li>
                    <li class="active">Galeri & Tips</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Galeri -->
<section class="section pt-5 pb-3">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 style="color:#C97B84;">Galeri Hasil Pekerjaan</h2>
            <p style="color:#555;">Dokumentasi hasil rias wajah dan dekorasi acara yang telah kami kerjakan.</p>
        </div>

        <div class="row">
            @foreach ([
                ['img'=>'rias-jawa.jpeg','title'=>'Rias Pengantin Adat Jawa','desc'=>'Sentuhan klasik adat Jawa untuk tampilan anggun.'],
                ['img'=>'rias-sunda.jpg','title'=>'Rias Pengantin Adat Sunda','desc'=>'Riasan elegan khas Sunda dengan mahkota siger.'],
                ['img'=>'rias-wisuda.jpg','title'=>'Rias Wisuda Modern','desc'=>'Make up natural-glam untuk acara wisuda.'],
                ['img'=>'rias-lamaran.jpg','title'=>'Rias Lamaran','desc'=>'Konsep simple dan natural cocok untuk acara lamaran.'],

                ['img'=>'dekorasi-outdoor.jpg','title'=>'Dekorasi Pernikahan Outdoor','desc'=>'Konsep dekorasi minimalis elegan di area taman.'],
                ['img'=>'dekorasi-pelaminan.jpg','title'=>'Dekorasi Pelaminan','desc'=>'Pelaminan bernuansa putih dengan sentuhan bunga segar.'],
                ['img'=>'backdrop-event.jpg','title'=>'Backdrop Event & Photobooth','desc'=>'Backdrop simple & cantik untuk spot foto.'],
                ['img'=>'meja-tamu.jpg','title'=>'Dekorasi Meja Tamu','desc'=>'Dekorasi meja tamu minimalis namun elegan.'],
            ] as $g)
            <div class="col-lg-3 col-md-4 col-12 mb-4">
                <div class="card shadow-sm" style="border:none; border-radius:12px; overflow:hidden;">
                    <img src="{{ asset('images/galeri/' . $g['img']) }}" alt="{{ $g['title'] }}"
                         style="width:100%; height:230px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#C97B84; font-weight:600;">{{ $g['title'] }}</h5>
                        <p class="card-text" style="color:#555; font-size:13px;">{{ $g['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Tips -->
<section class="blog-single shop-blog grid section" style="background:#fff9f9;">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 style="color:#C97B84;">Tips Rias & Dekorasi</h2>
            <p style="color:#555;">Kumpulan tips bermanfaat untuk tampil cantik dan merancang acara impianmu.</p>
        </div>

        <div class="row">
            @foreach ([
                [
                    'title'=>'Tips Memilih Make Up Sesuai Warna Kulit',
                    'desc'=>'Pilih foundation, blush, dan lipstick yang sesuai dengan undertone kulitmu agar hasil rias lebih natural.'
                ],
                [
                    'title'=>'Cara Agar Make Up Tahan Lama Saat Acara',
                    'desc'=>'Gunakan primer, setting spray, serta teknik layering agar make up tetap fresh seharian.'
                ],
                [
                    'title'=>'Ide Konsep Dekorasi Outdoor Modern',
                    'desc'=>'Gunakan warna-warna soft, lighting hangat, dan dekorasi minimalis untuk acara outdoor.'
                ],
                [
                    'title'=>'Tips Menentukan Tema Dekorasi Sesuai Lokasi',
                    'desc'=>'Sesuaikan tema dekorasi dengan ruangan indoor atau outdoor agar hasil lebih serasi.'
                ],
                [
                    'title'=>'Perawatan Wajah Sebelum Make Up',
                    'desc'=>'Lakukan skincare dasar seperti moisturizer dan sunscreen agar riasan lebih menempel.'
                ],
                [
                    'title'=>'Cara Menyusun Budget Dekorasi Acara',
                    'desc'=>'Prioritaskan item penting seperti pelaminan, lighting, dan bunga sesuai kebutuhan.'
                ],
            ] as $t)
            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <div class="shop-single-blog shadow-sm" style="border-radius:12px; overflow:hidden; background:white;">
                    <div class="content p-3">
                        <a href="#" class="title" style="color:#C97B84; font-weight:600;">{{ $t['title'] }}</a>
                        <p class="mt-2" style="color:#555; font-size:14px;">{{ $t['desc'] }}</p>
                        <a href="#" class="btn btn-sm mt-2" style="background:#C97B84; color:white; border-radius:30px;">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .section-title h2 {
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .card:hover img,
    .shop-single-blog:hover img {
        transform: scale(1.05);
        transition: 0.4s;
    }
</style>
@endpush
