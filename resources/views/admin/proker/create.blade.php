@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>Tambah Program Kerja</h1>

    <form action="{{ route('proker.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Perihal</label>
            <input type="text" name="perihal" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Rencana Tanggal Pelaksanaan</label>
            <input type="date" name="rencana_tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Realisasi Tanggal Pelaksanaan</label>
            <input type="date" name="realisasi_tanggal" class="form-control">
        </div>
        <div class="form-group">
            <label>Rencana Biaya Pelaksanaan</label>
            <input type="number" name="rencana_biaya" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Realisasi Biaya Pelaksanaan</label>
            <input type="number" name="realisasi_biaya" class="form-control">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Rencana">Rencana</option>
                <option value="Realisasi">Realisasi</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
