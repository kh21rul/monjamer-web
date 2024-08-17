<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>MonJaTir | {{ $title }}</title>

    <!-- Favicon -->
    <link href="{{ asset('landpages/img/favicon.png') }}" rel="icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('dashmin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashmin/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

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
        <div class="main-wrapper main-wrapper-1">
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="section-title">Rekap Data Monitoring
                                            {{ request('filter') ?: $today }}</div>
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Pukul</th>
                                                        <th>Suhu</th>
                                                        <th>Kelembapan</th>
                                                        <th>Kipas</th>
                                                        <th>Humidifier</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($controls->count() == 0)
                                                        <tr>
                                                            <td colspan="10" class="text-center">Belum ada data</td>
                                                        </tr>
                                                    @endif
                                                    @foreach ($controls as $control)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $control->created_at->format('d-m-Y') }}</td>
                                                            <td>{{ $control->created_at->format('H:i') }}</td>
                                                            <td>{{ $control->suhu }}</td>
                                                            <td>{{ $control->kelembapan }}</td>
                                                            <td>
                                                                <div
                                                                    class="badge {{ $control->kipas == 'Hidup' ? 'badge-danger' : 'badge-success' }}">
                                                                    {{ $control->kipas }}</div>
                                                            </td>
                                                            <td>
                                                                <div
                                                                    class="badge {{ $control->humidifier == 'Hidup' ? 'badge-danger' : 'badge-success' }}">
                                                                    {{ $control->humidifier }}</div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    {{-- perintah print --}}
    <script>
        window.print();
    </script>

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
