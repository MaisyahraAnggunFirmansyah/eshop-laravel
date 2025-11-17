@extends('frontend.layouts.master')

@section('main-content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{ route('home') }}">Beranda<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="javascript:void(0);">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="form-main">
                        <div class="title">
                            @php
                                $settings = DB::table('settings')->first();
                            @endphp
                            <h4>Hubungi Kami</h4>
                            <h3>Kami Siap Membantu Anda Memilih Layanan Rias & Dekorasi Terbaik!</h3>
                            @guest
                                <p class="text-danger" style="font-size: 13px;">*Silakan login terlebih dahulu untuk mengirim pesan</p>
                            @endguest
                        </div>
                        <form class="form-contact form contact_form" method="POST" action="{{ route('contact.store') }}" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Nama Anda<span>*</span></label>
                                        <input name="name" id="name" type="text" placeholder="Masukkan nama Anda" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Subjek<span>*</span></label>
                                        <input name="subject" id="subject" type="text" placeholder="Contoh: Permintaan Paket Dekorasi" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Email<span>*</span></label>
                                        <input name="email" id="email" type="email" placeholder="Masukkan email aktif" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>No. Telepon<span>*</span></label>
                                        <input id="phone" name="phone" type="number" placeholder="Masukkan nomor telepon" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Pesan Anda<span>*</span></label>
                                        <textarea name="message" id="message" cols="30" rows="6" placeholder="Tuliskan pertanyaan atau permintaan Anda" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button text-right">
                                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="single-head">
                        <div class="single-info">
                            <i class="fa fa-phone"></i>
                            <h4 class="title">Hubungi Kami Sekarang:</h4>
                            <ul>
                                <li>
                                    @if($settings && $settings->phone)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings->phone) }}" target="_blank">
                                            {{ $settings->phone }}
                                        </a>
                                    @else
                                        Belum ada nomor telepon yang tersedia
                                    @endif
                                </li>
                            </ul>
                        </div>

                        <div class="single-info">
                            <i class="fa fa-envelope-open"></i>
                            <h4 class="title">Email Kami:</h4>
                            <ul>
                                <li>
                                    @if($settings && $settings->email)
                                        <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                    @else
                                        info@riasdekorasi.com
                                    @endif
                                </li>
                            </ul>
                        </div>

                        <div class="single-info">
                            <i class="fa fa-location-arrow"></i>
                            <h4 class="title">Alamat Kami:</h4>
                            <ul>
                                <li>{{ $settings->address ?? 'Alamat belum ditambahkan' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--/ End Contact -->

<!-- Map Section -->
<div class="map-section">
    <div id="myMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!..." 
                width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                aria-hidden="false" tabindex="0"></iframe>
    </div>
</div>
<!--/ End Map Section -->

@include('frontend.layouts.newsletter')

<!-- Modals -->
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-success">Terima Kasih!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-success">Pesan Anda berhasil dikirim. Kami akan segera menghubungi Anda.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-warning">Maaf!</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-warning">Terjadi kesalahan. Silakan coba lagi nanti.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .modal-dialog .modal-content .modal-header {
        position: initial;
        padding: 10px 20px;
        border-bottom: 1px solid #e9ecef;
    }
    .modal-dialog .modal-content .modal-body {
        height: 100px;
        padding: 10px 20px;
    }
    .modal-dialog .modal-content {
        width: 50%;
        border-radius: 0;
        margin: auto;
    }
    .contact-us .single-info i {
        color: #B85C76; /* ungu modern */
    }
    .btn-primary {
        background-color: #C97B84;
        border-color: #6b21a8;
    }
    .btn-primary:hover {
        background-color: #F7941D;
        border-color: #581c87;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('frontend/js/contact.js') }}"></script>
@endpush
