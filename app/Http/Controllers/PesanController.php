<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function index() {

        $pesan = Pesan::all();
        $user = Auth::user();

        return view('akademik.pesan.index', [
            'user' => $user,
            'pesan' => $pesan
        ]);
    }

    public function update_publish_status(Request $request) {
        $status = $request->status;
        $pesan = Pesan::findOrFail(1);
        $pesan->status = $status;
        $pesan->save();
        return response()->json(['success' => $status, 'message' => $pesan]);
    }

    public function edit($id) {

        $pesan = Pesan::findOrFail($id);
        $user = Auth::user();

        return view('akademik.pesan.edit', [
            'pesan' => $pesan,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id) {
        $pesan = Pesan::findOrFail($id);

        $this->validate($request, [
            'pesan' => 'required|string|max:255'
        ]);

        $pesan->update([
            'message' => $request->pesan,
        ]);

        return redirect()->route('pesan')->with(['success' => 'Data Berhasil Disimpan!']);

    }
}
