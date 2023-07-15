<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = User::findOrFail(Auth::id());
        $roles = $user->getRoleNames();

        if ($roles[0] == 'dosen') {
            return view('home.index');
        } elseif ($roles[0] == 'akademik') {
            return view('akademik.home.index');
        } else {
            return view('home.index');
        }
    }
}
