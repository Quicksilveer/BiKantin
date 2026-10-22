<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SiswaController extends Controller
{
    public function dashboard(Request $request): View
    {
        return view('siswa.dashboard', [
            'siswa' => $request->user()->siswa,
        ]);
    }
}
