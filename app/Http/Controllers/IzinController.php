<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Izin;

class IzinController extends Controller
{
    public function index()
    {
        $izin = Izin::all();
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
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'keterangan' => 'required',
        ]);

        Izin::create($validated);

        return redirect()->route('izin.index')->with('success', 'Izin berhasil ditambahkan');
    }

    public function edit($id)
    {
        $izin = Izin::findOrFail($id);
        return view('izin.edit', compact('izin'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'keterangan' => 'required',
        ]);

        $izin = Izin::findOrFail($id);
        $izin->update($validated);

        return redirect()->route('izin.index')->with('success', 'Izin berhasil diubah');
    }

    public function destroy($id)
    {
        $izin = Izin::findOrFail($id);
        $izin->delete();

        return redirect()->route('izin.index')->with('success', 'izin berhasil dihapus');
    }
}