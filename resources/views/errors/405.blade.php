@php
    $title = '405';
@endphp
@extends('layouts.main')

@section('hero')
    {{-- pembuka div ada pada main --}}
    <div class="container-xxl bg-primary page-header">
        <div class="container text-center">
            <h1 class="text-white animated zoomIn mb-3">Method Not Allowed</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">405</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('container')
    <!-- 405 Start -->
    <div class="container-xxl py-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">405</h1>
                    <h1 class="mb-4">Method Not Allowed</h1>
                    <p class="mb-4">The method specified in the request is not allowed for the resource identified by the
                        request URI. The response must include an Allow header containing a list of valid methods for the
                        requested resource.</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home') }}">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 405 End -->
@endsection
