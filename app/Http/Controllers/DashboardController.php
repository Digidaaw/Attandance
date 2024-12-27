<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function inputKehadiran()
    {
        return view('dashboard.input.kehadiran');
    }

    public function inputIzin()
    {
        return view('dashboard.input.izin');
    }

    public function inputLembur()
    {
        return view('dashboard.input.lembur');
    }
}
