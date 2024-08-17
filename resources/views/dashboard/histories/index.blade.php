@extends('dashboard.layouts.main')

@section('container')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rekap Monitoring</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Rekap Monitoring</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Rekapitulasi Monitoring Jamur Tiram</h2>
                <p class="section-lead">
                    Berikut data rekapitulasi monitoring jamur tiram yang di update 1 jam sekali.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <form class="form-inline ml-auto" action="{{ route('dashboard.controls.index') }}">
                                        <!-- Input Pencarian -->
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="date" class="form-control" name="filter"
                                                value="{{ request('filter') ?: $today }}">
                                        </div>
                                        <!-- Tombol Cari -->
                                        <button type="submit" class="btn btn-primary mb-2 mr-2"><i
                                                class="fas fa-search"></i> Filters</button>
                                        <!-- Tombol Cetak -->
                                        <a class="btn btn-success mb-2" target="_blank"
                                            href="/dashboard/cetak{{ request()->has('filter') ? '?filter=' . request('filter') : '' }}"><i
                                                class="fas fa-print"></i> Cetak</a>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Pukul</th>
                                                <th>Suhu</th>
                                                <th>Kelembapan</th>
                                                <th>Kipas</th>
                                                <th>Humidifier</th>
                                                <th>Aksi</th>
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
                                                    <td>
                                                        <form id="delete"
                                                            action="{{ route('dashboard.controls.destroy', $control->id) }}"
                                                            method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-danger btn-action" data-toggle="tooltip"
                                                                title="Delete"
                                                                data-confirm="Apakah Kamu Yakin?|This action can not be undone. Do you want to continue?"
                                                                data-confirm-yes="deleteButton()"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
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

    {{-- Penggunaan funtion tombol delete --}}
    <script>
        function deleteButton() {
            event.preventDefault();
            const form = document.getElementById("delete");
            form.submit();
        }
    </script>
@endsection
