@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>Edit Program Kerja</h1>

    <form action="{{ route('proker.update', $proker) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Perihal</label>
            <input type="text" name="perihal" class="form-control" value="{{ $proker->perihal }}" required>
        </div>
        <div class="form-group">
            <label>Rencana Tanggal Pelaksanaan</label>
            <input type="date" name="rencana_tanggal" class="form-control" value="{{ $proker->rencana_tanggal }}" required>
        </div>
        <div class="form-group">
            <label>Realisasi Tanggal Pelaksanaan</label>
            <input type="date" name="realisasi_tanggal" class="form-control" value="{{ $proker->realisasi_tanggal }}">
        </div>
        <div class="form-group">
            <label>Rencana Biaya Pelaksanaan</label>
            <input type="number" name="rencana_biaya" class="form-control" value="{{ $proker->rencana_biaya }}" required>
        </div>
        <div class="form-group">
            <label>Realisasi Biaya Pelaksanaan</label>
            <input type="number" name="realisasi_biaya" class="form-control" value="{{ $proker->realisasi_biaya }}">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Rencana" {{ $proker->status == 'Rencana' ? 'selected' : '' }}>Rencana</option>
                <option value="Realisasi" {{ $proker->status == 'Realisasi' ? 'selected' : '' }}>Realisasi</option>
                <option value="Selesai" {{ $proker->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
