@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>Tambah Program Kerja</h1>

    <form action="{{ route('proker.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Perihal</label>
            <input type="text" name="perihal" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Tujuan</label>
            <textarea name="tujuan" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Rencana Tanggal Pelaksanaan</label>
            <input type="date" name="rencana_tanggal" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Realisasi Tanggal Pelaksanaan</label>
            <input type="date" name="realisasi_tanggal" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label>Sumber Dana</label>
            <input type="text" name="sumber_dana" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Rencana Biaya Pelaksanaan</label>
            <input type="number" name="rencana_biaya" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Realisasi Biaya Pelaksanaan</label>
            <input type="number" name="realisasi_biaya" class="form-control">
        </div>

        <div class="form-group mb-3">
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
