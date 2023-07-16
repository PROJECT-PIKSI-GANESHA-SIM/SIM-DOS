<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Models\Pengajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DosenController extends Controller
{
    public function index() {

        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');
        })->paginate(5);

        return view('akademik.dosen.index', compact('users'));
    }

    public function edit($id) {

        $user = User::findOrFail($id);
        $pendidikan = Pendidikan::where('user_id', $user->id)->paginate(5);
        $pengajaran = Pengajaran::where('user_id', $user->id)->paginate(5);
        $penelitian = Penelitian::where('user_id', $user->id)->paginate(5);
        $pengabdian = Pengabdian::where('user_id', $user->id)->paginate(5);

        return view('akademik.dosen.detail', [
            'user' => $user,
            'pendidikan' => $pendidikan,
            'pengajaran' => $pengajaran,
            'penelitian' => $penelitian,
            'pengabdian' => $pengabdian
        ]);
    }

}
