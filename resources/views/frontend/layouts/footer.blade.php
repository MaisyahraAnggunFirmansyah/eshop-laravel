<!-- Start Footer Area -->
<footer class="footer" style="background-color:#C97B84;">
	<!-- Footer Top -->
	<div class="footer-top section">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-6 col-12">
					<!-- Single Widget -->
					<div class="single-footer about">
						<div class="logo">
							<a href="{{ url('/') }}">
								<img src="{{ asset('backend/img/logo2.png') }}" alt="Azzahra Make Up" style="max-height: 70px;">
							</a>
						</div>
						@php
							$settings = DB::table('settings')->get();
						@endphp
						<p class="text">
							@foreach($settings as $data)
								{{ $data->short_des }}
							@endforeach
						</p>
						<p class="call">
							Ingin tampil menawan di hari istimewa? <br>
							<span style="font-weight:bold;">Hubungi Kami Sekarang:</span>
							<span>
								<a href="tel:@foreach($settings as $data){{$data->phone}}@endforeach" style="color:#973551;">
									@foreach($settings as $data) {{$data->phone}} @endforeach
								</a>
							</span>
						</p>
					</div>
					<!-- End Single Widget -->
				</div>

				<div class="col-lg-2 col-md-6 col-12">
					<!-- Single Widget -->
					<div class="single-footer links">
						<h4>Layanan Kami</h4>
						<ul>
							<li><a href="{{ route('about-us') }}">Tentang Kami</a></li>
							<li><a href="{{ route('product-grids') }}">Rias Pengantin</a></li>
							<li><a href="{{ route('product-grids') }}">Busana & Aksesori</a></li>
							<li><a href="{{ route('product-grids') }}">Dekorasi Acara</a></li>
							<li><a href="{{ route('contact') }}">Kontak Kami</a></li>
						</ul>
					</div>
					<!-- End Single Widget -->
				</div>

				<div class="col-lg-2 col-md-6 col-12">
					<!-- Single Widget -->
					<div class="single-footer links">
						<h4>Bantuan & Informasi</h4>
						<ul>
							<li><a href="#">Cara Pemesanan</a></li>
							<li><a href="#">Kebijakan Pembayaran</a></li>
							<li><a href="#">Pengembalian & Refund</a></li>
							<li><a href="#">Syarat & Ketentuan</a></li>
							<li><a href="#">Kebijakan Privasi</a></li>
						</ul>
					</div>
					<!-- End Single Widget -->
				</div>

				<div class="col-lg-3 col-md-6 col-12">
					<!-- Single Widget -->
					<div class="single-footer social">
						<h4>Hubungi Kami</h4>
						<div class="contact">
							<ul>
								<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
								<li>Email: @foreach($settings as $data) {{$data->email}} @endforeach</li>
								<li>Telepon: @foreach($settings as $data) {{$data->phone}} @endforeach</li>
							</ul>
						</div>
						<div class="sharethis-inline-follow-buttons" style="margin-top:10px;"></div>
					</div>
					<!-- End Single Widget -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Footer Top -->

	<!-- Copyright -->
	<div class="copyright" style="background-color:#B85C76; color:white;">
		<div class="container">
			<div class="inner">
				<div class="row align-items-center">
					<div class="col-lg-6 col-12">
						<div class="left">
							<p>
								© {{ date('Y') }} <strong>Azzahra Make Up</strong> — Semua Hak Dilindungi.
							</p>
						</div>
					</div>
					<div class="col-lg-6 col-12 text-end">
						<div class="right">
							<img src="{{ asset('backend/img/payments.png') }}" alt="Metode Pembayaran" style="max-height:40px;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- /End Footer Area -->


<!-- JS Files -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/colors.js')}}"></script>
<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
<script src="{{asset('frontend/js/scrollup.js')}}"></script>
<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/easing.js')}}"></script>
<script src="{{asset('frontend/js/active.js')}}"></script>

@stack('scripts')

<script>
	setTimeout(function(){
		$('.alert').slideUp();
	}, 5000);

	$(function() {
		// Multi Level dropdowns
		$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
			event.preventDefault();
			event.stopPropagation();

			$(this).siblings().toggleClass("show");

			if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
			}

			$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
			});
		});
	});
</script>
