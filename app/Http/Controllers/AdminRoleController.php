<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalUser;

class AdminRoleController extends Controller
{
    public function index()
    {
        $users = LocalUser::whereIn('role', ['admin', 'bendahara', 'kaprodi'])->get();
        return view('admin.role.index', compact('users'));
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'role' => 'required|string|in:admin,kaprodi,bendahara,mahasiswa',
            'masa_jabatan' => 'required_if:role,admin,kaprodi,bendahara|nullable|string',
        ]);

        $user = LocalUser::firstOrCreate(
            ['username' => $request->username],
            ['nama' => $request->username] 
        );

        $user->role = $request->role;

        // Cek jika role admin, kaprodi, bendahara, maka isi masa_jabatan
        if (in_array($request->role, ['admin', 'kaprodi', 'bendahara'])) {
            $user->masa_jabatan = $request->masa_jabatan;
        } else {
            $user->masa_jabatan = null; // untuk mahasiswa biasa
        }

        $user->save();

        return redirect()->route('admin.role.index')->with('success', 'Role berhasil disimpan untuk ' . $user->username);
    }
}
