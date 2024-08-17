@extends('dashboard.layouts.main')

@section('container')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-temperature-low"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Suhu</h4>
                            </div>
                            <div class="card-body">
                                <span id="suhu">0</span> °C
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-water"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kelembapan</h4>
                            </div>
                            <div class="card-body">
                                <span id="kelembapan">0</span> %
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-atom"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kipas</h4>
                            </div>
                            <div class="card-body">
                                <span id="kipas">Off</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-wind"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Humidifier</h4>
                            </div>
                            <div class="card-body">
                                <span id="humidifier">Off</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Rekap Monitoring Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
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
        </section>
    </div>
    <!-- End Content -->
@endsection

@section('page-script')
    {{-- ajax untuk realtime --}}
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $.get("{{ url('readsensors') }}", function(data) {
                    if (data) {
                        $("#suhu").text(data.suhu);
                        $("#kelembapan").text(data.kelembapan);
                        $("#kipas").text(data.kipas);
                        $("#humidifier").text(data.humidifier);
                    }
                });
            }, 1000);
        });
    </script>
@endsection
