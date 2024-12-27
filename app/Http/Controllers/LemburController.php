<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\lembur;

class LemburController extends Controller
{
    public function index()
    {
        $lembur = Lembur::all();
        $user = User::all();
        return view('lembur.index', compact('lembur'));
    }

    public function create()
    {
        return view('lembur.create');
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

        Lembur::create($validated);

        return redirect()->route('lembur.index')->with('success', 'Lembur berhasil ditambahkan');
    }

    public function edit($id)
    {
        $lembur = Lembur::findOrFail($id);
        return view('lembur.edit', compact('lembur'));
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

        $lembur = Lembur::findOrFail($id);
        $lembur->update($validated);

        return redirect()->route('lembur.index')->with('success', 'Lembur berhasil diubah');
    }

    public function destroy($id)
    {
        $lembur = Lembur::findOrFail($id);
        $lembur->delete();

        return redirect()->route('lembur.index')->with('success', 'lembur berhasil dihapus');
    }
}
