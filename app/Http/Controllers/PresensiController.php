<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\presensi;

class PresensiController extends Controller
{
    public function index()
    {
        $presensi = presensi::all();
        $user = User::all();
        return view('presensi.index', compact('presensi'));
    }

    public function show()
    {
    return redirect()->route('presensi.index');
    }

    public function create()
    {
        return view('presensi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
        ]);

        $validated['user_id'] = auth()->id();
        $presensi = Presensi::create($validated);

        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $presensi = Presensi::findOrFail($id);
        return view('presensi.edit', compact('presensi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
        ]);

        dd($validated);

        $presensi = Presensi::findOrFail($id);
        $presensi->update($validated);

        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil diubah');
    }

    public function destroy($id)
    {
        $presensi = Presensi::findOrFail($id);
        $presensi->delete();

        return redirect()->route('presensi.index')->with('success', 'Presensi berhasil dihapus');
    }
}
