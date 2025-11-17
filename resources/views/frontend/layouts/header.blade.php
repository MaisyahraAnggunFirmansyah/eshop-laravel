<header class="header shop" style="border-bottom:2px solid #C97B84;">
    <!-- Topbar -->
    <div class="topbar" style="background-color:#fdf8f9;">
        <div class="container">
            <div class="row">
                @php
                    $settings = DB::table('settings')->first();
                @endphp
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt" style="color:#C97B84;"></i>
                                {{ $settings->phone ?? '0812-3456-7890' }}
                            </li>
                            <li><i class="ti-email" style="color:#C97B84;"></i>
                                {{ $settings->email ?? 'info@riasdekor.com' }}
                            </li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin" style="color:#C97B84;"></i>
                                <a href="{{ route('order.track') }}">Lacak Pesanan</a>
                            </li>
                            @auth
                                @if (Auth::user()->role == 'admin')
                                    <li><i class="ti-user" style="color:#C97B84;"></i>
                                        <a href="{{ route('admin') }}" target="_blank">Dashboard</a>
                                    </li>
                                @else
                                    <li><i class="ti-user" style="color:#C97B84;"></i>
                                        <a href="{{ route('user') }}" target="_blank">Akun Saya</a>
                                    </li>
                                @endif
                                <li><i class="ti-power-off" style="color:#C97B84;"></i>
                                    <a href="{{ route('user.logout') }}">Logout</a>
                                </li>
                            @else
                                <li><i class="ti-user" style="color:#C97B84;"></i>
                                    <a href="{{ route('login.form') }}">Login</a> /
                                    <a href="{{ route('register.form') }}">Daftar</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->

    <div class="middle-inner">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ $settings->logo ?? asset('backend/img/logo2.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="mobile-nav"></div>
                </div>

                <!-- Search Bar -->
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option>Semua Kategori</option>
                                @foreach (Helper::getAllCategory() as $cat)
                                    <option>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                            <form method="POST" action="{{ route('product.search') }}">
                                @csrf
                                <input name="search" placeholder="Cari Layanan Rias atau Dekorasi..." type="search">
                                <button class="btnn" type="submit" style="background-color:#C97B84;">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Wishlist & Cart -->
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar d-flex justify-content-end">
                        <div class="single-bar">
                            <a href="{{ route('wishlist') }}" class="single-icon">
                                <i class="fa fa-heart-o"></i>
                                <span class="total-count">{{ Helper::wishlistCount() }}</span>
                            </a>
                        </div>
                        <div class="single-bar shopping">
                            <a href="{{ route('cart') }}" class="single-icon">
                                <i class="ti-bag"></i>
                                <span class="total-count">{{ Helper::cartCount() }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="header-inner" style="background-color:#B85C76;">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="nav-inner">
                    <ul class="nav main-menu menu navbar-nav">
                        <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
                            <a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="{{ Request::path() == 'about-us' ? 'active' : '' }}">
                            <a href="{{ route('about-us') }}">Tentang Kami</a>
                        </li>
                        <li class="@if (Request::path() == 'product-grids' || Request::path() == 'product-lists') active @endif">
                            <a href="{{ route('product-grids') }}" style="color:#C97B84;">Layanan</a>
                        </li>
                        <li><a href="{{ route('blog') }}">Galeri & Tips</a></li>
                        <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
