@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>Daftar Program Kerja</h1>
    <a href="{{ route('proker.create') }}" class="btn btn-primary mb-3">Tambah Proker</a>
    <a href="{{ route('proker.history') }}" class="btn btn-info mb-3">Riwayat Proker</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
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
                <th>Masa Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prokers as $proker)
            <tr>
                <td>{{ $proker->perihal }}</td>
                <td>{{ $proker->deskripsi }}</td>
                <td>{{ $proker->tujuan }}</td>
                <td>{{ $proker->lokasi }}</td>
                <td>{{ $proker->rencana_tanggal }}</td>
                <td>{{ $proker->realisasi_tanggal ?? '-' }}</td>
                <td>{{ $proker->sumber_dana }}</td>
                <td>Rp {{ number_format($proker->rencana_biaya) }}</td>
                <td>
                    @if($proker->realisasi_biaya)
                        Rp {{ number_format($proker->realisasi_biaya) }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ $proker->status }}</td>
                <td>{{ $proker->masa_jabatan }}</td>
                <td>
                    <a href="{{ route('proker.edit', $proker->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('proker.destroy', $proker->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


