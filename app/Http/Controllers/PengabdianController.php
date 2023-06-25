<?php

namespace App\Http\Controllers;

use App\Models\Pengabdian;
use Illuminate\Http\Request;

class PengabdianController extends Controller
{
    function index() {
        $pengabdian = Pengabdian::all();

        return view('pengabdian.index', compact('pengabdian'));
    }

    function create() {
        return view('pengabdian.create');
    }
}
