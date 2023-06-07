<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajaranController extends Controller
{
    public function index() {
        return view('pengajaran.index');
    }

    public function create() {
        return view('pengajaran.create');
    }
}
