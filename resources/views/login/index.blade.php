@php
    $title = 'Login';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>MonJaMer | {{ $title }}</title>

    <!-- Favicon -->
    <link href="{{ asset('landing-pages/assets/img/favicons/favicon.svg') }}" rel="icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('dashmin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashmin/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('dashmin/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('dashmin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashmin/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('dashmin/img/stisla-fill.svg') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        @if (session()->has('loginError'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('loginError') }}
                            </div>
                        @endif

                        <div class="card card-success">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('authenticate') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            tabindex="1" required autofocus>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            tabindex="2" required>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; MonJaMer {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('dashmin/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('dashmin/modules/popper.js') }}"></script>
    <script src="{{ asset('dashmin/modules/tooltip.js') }}"></script>
    <script src="{{ asset('dashmin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashmin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('dashmin/modules/moment.min.js') }}"></script>
    <script src="{{ asset('dashmin/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('dashmin/js/scripts.js') }}"></script>
    <script src="{{ asset('dashmin/js/custom.js') }}"></script>
</body>

</html>
