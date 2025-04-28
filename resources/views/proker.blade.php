<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Program Kerja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Program Kerja</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Perihal</th>
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
                @forelse ($prokers as $index => $proker)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $proker->perihal }}</td>
                        <td>{{ $proker->tujuan }}</td>
                        <td>{{ $proker->lokasi }}</td>
                        <td>{{ $proker->rencana_tanggal }}</td>
                        <td>{{ $proker->realisasi_tanggal ?? '-' }}</td>
                        <td>{{ $proker->sumber_dana }}</td>
                        <td>Rp {{ number_format($proker->rencana_biaya, 0, ',', '.') }}</td>
                        <td>{{ $proker->realisasi_biaya ? 'Rp '.number_format($proker->realisasi_biaya, 0, ',', '.') : '-' }}</td>
                        <td>{{ $proker->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Belum ada Program Kerja.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
