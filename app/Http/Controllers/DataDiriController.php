<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDiriController extends Controller
{
    public function index() {
        return view('data_diri.index');
    }
}
