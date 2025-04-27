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

    public function create()
    {
        return view('admin.proker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'perihal' => 'required',
            'rencana_tanggal' => 'required|date',
            'rencana_biaya' => 'required|integer',
            'status' => 'required'
        ]);

        $user = session('user');

        Proker::create([
            'perihal' => $request->perihal,
            'rencana_tanggal' => $request->rencana_tanggal,
            'realisasi_tanggal' => $request->realisasi_tanggal,
            'rencana_biaya' => $request->rencana_biaya,
            'realisasi_biaya' => $request->realisasi_biaya,
            'status' => $request->status,
            'username_role_admin' => $user['username'],
            'masa_jabatan' => $user['masa_jabatan'] // tambahkan ini
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
            'perihal' => 'required',
            'rencana_tanggal' => 'required|date',
            'rencana_biaya' => 'required|integer',
            'status' => 'required'
        ]);

        $proker->update($request->all());

        return redirect()->route('proker.index')->with('success', 'Program Kerja berhasil diupdate.');
    }

    public function destroy(Proker $proker)
    {
        $proker->delete();
        return redirect()->route('proker.index')->with('success', 'Program Kerja berhasil dihapus.');
    }
}
