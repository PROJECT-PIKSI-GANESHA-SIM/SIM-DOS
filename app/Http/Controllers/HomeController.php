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
        // dd($user);
        $roles = $user->getRoleNames();

        $all_user = User::whereHas('roles', function ($query) {
            $query->where('name', 'dosen');

        })->paginate(10);

        if ($roles[0] == 'dosen') {
            return view('home.index', compact('user'));
        } elseif ($roles[0] == 'akademik') {
            return view('akademik.home.index', [
                'user' => Auth::user(),
                'all_user' => $all_user
            ]);
        } else {
            return view('home.index', compact('user'));
        }
    }
}
