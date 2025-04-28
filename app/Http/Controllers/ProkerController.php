<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProkerController extends Controller
{
    public function index()
    {
        $user = session('user');
        $prokers = Proker::where('masa_jabatan', $user['masa_jabatan'])->get();
        return view('admin.proker.index', compact('prokers'));
    }

    public function tampilUmum()
    {
        $maxMasaJabatan = Proker::max('masa_jabatan');
        $prokers = Proker::where('masa_jabatan', $maxMasaJabatan)->get();
        return view('proker', compact('prokers'));
    }


    public function create()
    {
        return view('admin.proker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'perihal' => 'required|string',
            'deskripsi' => 'required|string',
            'tujuan' => 'required|string',
            'lokasi' => 'required|string',
            'rencana_tanggal' => 'required|date',
            'realisasi_tanggal' => 'nullable|date',
            'sumber_dana' => 'required|string',
            'rencana_biaya' => 'required|integer',
            'realisasi_biaya' => 'nullable|integer',
            'status' => 'required|string'

        ]);

        $user = session('user');

        Proker::create([
            'perihal' => $request->perihal,
            'deskripsi' => $request->deskripsi,
            'tujuan' => $request->tujuan,
            'lokasi' => $request->lokasi,
            'rencana_tanggal' => $request->rencana_tanggal,
            'realisasi_tanggal' => $request->realisasi_tanggal,
            'sumber_dana' => $request->sumber_dana,
            'rencana_biaya' => $request->rencana_biaya,
            'realisasi_biaya' => $request->realisasi_biaya,
            'status' => $request->status,
            'masa_jabatan' => $user['masa_jabatan'],

        ]);

        return redirect()->route('proker.index')->with('success', 'Program Kerja berhasil ditambahkan.');
    }

    public function edit(Proker $proker)
    {
        return view('admin.proker.edit', compact('proker'));
    }

    public function update(Request $request, Proker $proker)
    {
        $request->validate([
            'perihal' => 'required|string',
            'deskripsi' => 'required|string',
            'tujuan' => 'required|string',
            'lokasi' => 'required|string',
            'rencana_tanggal' => 'required|date',
            'realisasi_tanggal' => 'nullable|date',
            'sumber_dana' => 'required|string',
            'rencana_biaya' => 'required|integer',
            'realisasi_biaya' => 'nullable|integer',
            'status' => 'required|string'

        ]);

        $proker->update($request->all());

        return redirect()->route('proker.index')->with('success', 'Program Kerja berhasil diupdate.');
    }

    public function destroy(Proker $proker)
    {
        $proker->delete();
        return redirect()->route('proker.index')->with('success', 'Program Kerja berhasil dihapus.');
    }

    public function history(Request $request)
    {
        $masaJabatans = \App\Models\LocalUser::whereNotNull('masa_jabatan')->pluck('masa_jabatan')->unique();
        $selectedMasaJabatan = $request->query('masa_jabatan');
        $prokers = collect();
        if ($selectedMasaJabatan) {
            $prokers = \App\Models\Proker::where('masa_jabatan', $selectedMasaJabatan)->get();
        }
        return view('admin.proker.history', compact('prokers', 'masaJabatans'));
    }
}
