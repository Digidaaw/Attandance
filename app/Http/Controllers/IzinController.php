<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\izin;

class IzinController extends Controller
{
    public function index()
    {
        $izin = izin::all();
        $user = User::all();
        return view('izin.index', compact('izin'));
    }

    public function create()
    {
        return view('izin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_izin' => 'required|in:sakit,cuti,lainnya',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'alasan' => 'required',
            'status' => 'required|in:pending,approved,declined'
        ]);

        $validated['user_id'] = auth()->id();
        izin::create($validated);

        return redirect()->route('karyawan.izin.create')->with('success', 'Izin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $izin = izin::findOrFail($id);
        return view('izin.edit', compact('izin'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'alasan' => 'required',
        ]);

        $izin = izin::findOrFail($id);
        $izin->update($validated);

        return redirect()->route('izin.index')->with('success', 'Izin berhasil diubah');
    }

    public function destroy($id)
    {
        $izin = izin::findOrFail($id);
        $izin->delete();

        return redirect()->route('izin.index')->with('success', 'izin berhasil dihapus');
    }
}