@extends('admin.layouts')

@section('content')
<div class="container mt-4">
    <h2>Riwayat Program Kerja</h2>
    <form method="GET" action="" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="masa_jabatan" class="form-control" onchange="this.form.submit()">
                    <option value="">-- Pilih Masa Jabatan --</option>
                    @foreach($masaJabatans as $mj)
                        <option value="{{ $mj }}" {{ request('masa_jabatan') == $mj ? 'selected' : '' }}>{{ $mj }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Perihal</th>
                    <th>Deskripsi</th>
                    <th>Tujuan</th>
                    <th>Lokasi</th>
                    <th>Rencana Tanggal</th>
                    <th>Realisasi Tanggal</th>
                    <th>Sumber Dana</th>
                    <th>Rencana Biaya</th>
                    <th>Realisasi Biaya</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($prokers as $proker)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $proker->perihal }}</td>
                    <td>{{ $proker->deskripsi }}</td>
                    <td>{{ $proker->tujuan }}</td>
                    <td>{{ $proker->lokasi }}</td>
                    <td>{{ $proker->rencana_tanggal }}</td>
                    <td>{{ $proker->realisasi_tanggal }}</td>
                    <td>{{ $proker->sumber_dana }}</td>
                    <td>{{ number_format($proker->rencana_biaya,0,',','.') }}</td>
                    <td>{{ $proker->realisasi_biaya ? number_format($proker->realisasi_biaya,0,',','.') : '-' }}</td>
                    <td>{{ $proker->status }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-center">Belum ada program kerja yang tercatat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection