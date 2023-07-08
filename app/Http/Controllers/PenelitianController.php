<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    public function index() {
        return view('penelitian.index');
    }

    public function create() {

        return view('penelitian.create');
    }
}
