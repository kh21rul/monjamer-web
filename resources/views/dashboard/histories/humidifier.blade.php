@extends('dashboard.layouts.main')

@section('container')
    {{-- Tangkap session & Muculkan modal sweetalert --}}
    <div class="flash-success" data-flashsuccess="{{ session('success') }}"></div>

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>History Humidifier Control</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">History Humidifier</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Riwayat Pelembab Menyala</h2>
                <p class="section-lead">
                    Berikut data rekapitulasi dari nyalanya pelembab
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <form class="form-inline ml-auto" action="{{ route('dashboard.history.humidifier') }}">
                                        <!-- Input Pencarian -->
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="date" class="form-control" name="filter"
                                                value="{{ request('filter') ?: date('Y-m-d') }}">
                                        </div>
                                        <!-- Tombol Cari -->
                                        <button type="submit" class="btn btn-primary mb-2 mr-2"><i
                                                class="fas fa-search"></i> Filters</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Mulai</th>
                                                <th>Selesai</th>
                                                <th>lama Hidup</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($histories as $history)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($history->start_time)->format('H:i') }}
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="badge {{ $history->end_time == null ? 'badge-danger' : '' }}">
                                                            {{ $history->end_time ? \Carbon\Carbon::parse($history->end_time)->format('H:i') : 'Sedang On' }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div
                                                            class="badge {{ $history->duration == null ? 'badge-danger' : '' }}">
                                                            {{ $history->duration? \Carbon\CarbonInterval::seconds($history->duration)->cascade()->forHumans(): 'Sedang On' }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('dashboard.history.humidifier.delete', $history->id) }}"
                                                            class="delete-form" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-action"
                                                                title="Delete"><i class="fas fa-trash"></i></button>
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
@endsection

@section('page-script')
    {{-- Penggunaan funtion tombol delete --}}
    <script>
        const flashSuccess = $(".flash-success").data("flashsuccess");

        // Jika terjadi perubahan CRUD
        if (flashSuccess) {
            swal({
                title: "Data",
                text: "Berhasil " + flashSuccess,
                icon: "success",
            });
        }

        // konfirmasi hapus data
        $(document).ready(function() {
            $(".delete-form").on("submit", function(e) {
                e.preventDefault();

                var form = this;

                swal({
                    title: "Apakah kamu yakin?",
                    text: "Data akan dihapus",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
