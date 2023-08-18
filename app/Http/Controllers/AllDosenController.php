<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AllDosenController extends Controller
{
    public function index()
    {

        $users_dosen = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');
        })->paginate(5);

        return view('dosen', [
            'users_dosen' => $users_dosen,
            "title" => "Dosen"
        ]);
    }

    public function detail($id)
    {
        $detaildosen = User::findOrFail($id);
        return view('detaildosen', [
            "title" => "Detail Dosen",
            "detaildosen" => $detaildosen
        ]);
    }
}
