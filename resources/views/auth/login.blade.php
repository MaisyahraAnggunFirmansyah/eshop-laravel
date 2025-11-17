<!DOCTYPE html>
<html lang="en">

<head>
    <title>Azzahra Make Up || Login Admin</title>
    @include('backend.layouts.head')

    <style>
        body {
            background: linear-gradient(135deg, #FDEEEF, #F8DDE2);
            font-family: 'Poppins', sans-serif;
        }

        .bg-login-image {
            background: url('{{ asset("images/admin/login-bg.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        .card {
            border-radius: 18px;
        }

        .btn-azzahra {
            background: #C97B84;
            color: white;
            border-radius: 30px;
            transition: 0.3s;
        }

        .btn-azzahra:hover {
            background: #a25c63;
            color: white;
        }

        .text-azzahra {
            color: #C97B84 !important;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-10 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <!-- LEFT IMAGE -->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                            <!-- RIGHT FORM -->
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center mb-4">
                                        <h1 class="h4 text-azzahra mb-2">💄 Login Admin</h1>
                                        <p class="text-muted">Masuk untuk mengelola website Azzahra Make Up</p>
                                    </div>

                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email -->
                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}"
                                                placeholder="Email Admin..." required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password"
                                                required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Remember -->
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    Ingat Saya
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Submit -->
                                        <button type="submit" class="btn btn-azzahra btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="small text-azzahra" href="{{ route('password.request') }}">
                                                Lupa Password?
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
