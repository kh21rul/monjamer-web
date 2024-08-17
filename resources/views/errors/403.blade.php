@php
    $title = '403';
@endphp
@extends('layouts.main')

@section('hero')
    {{-- pembuka div ada pada main --}}
    <div class="container-xxl bg-primary page-header">
        <div class="container text-center">
            <h1 class="text-white animated zoomIn mb-3">Forbidden</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">403</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('container')
    <!-- 403 Start -->
    <div class="container-xxl py-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">403</h1>
                    <h1 class="mb-4">Forbidden</h1>
                    <p class="mb-4">The server understood the request, but refuses to authorize it. This status code
                        indicates that the server is refusing to fulfill the request, despite being authenticated. The
                        client does not have the necessary permissions for the resource.</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('home') }}">Go Back To Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 403 End -->
@endsection
