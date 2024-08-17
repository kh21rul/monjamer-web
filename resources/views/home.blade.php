@extends('layouts.main')

@section('container')
    <section class="py-0" id="header">
        <div class="bg-holder d-none d-md-block"
            style="background-image:url({{ asset('landing-pages/assets/img/illustrations/hero-header.png') }});background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->
        <div class="bg-holder d-md-none"
            style="background-image:url({{ asset('landing-pages/assets/img/illustrations/hero-bg.png') }});background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->
        <div class="container">
            <div class="row align-items-center min-vh-75 min-vh-lg-100">
                <div class="col-md-7 col-lg-6 col-xxl-5 py-6 text-sm-start text-center">
                    <h1 class="mt-6 mb-sm-4 fw-semi-bold lh-sm fs-4 fs-lg-5 fs-xl-6">MonJaMer <br
                            class="d-block d-lg-block" />(Monitoring Jamur Merang)</h1>
                    <p class="mb-4 fs-1">
                        Mari monitoring jamur merangmu bersama MonJaMer agar hasil panenmu lebih bagus dan baik
                    </p>
                    <a class="btn btn-lg btn-success" href="{{ route('dashboard') }}">
                        Mulai Monitoring
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5" id="Opportuanities">
        <div class="bg-holder d-none d-sm-block"
            style="background-image:url({{ asset('landing-pages/assets/img/illustrations/bg.png') }});background-position:top left;background-size:225px 755px;margin-top:-17.5rem;">
        </div>
    </section>
@endsection
