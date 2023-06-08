<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class PengajaranController extends Controller
{
    public function index() {
        return view('pengajaran.index');
    }

    public function create() {

        $program_studi = ProgramStudi::all();

        return view('pengajaran.create', [
            'program_studi' => $program_studi
        ]);
    }
}
