<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index() {

        $pesan = Pesan::all();

        return view('akademik.pesan.index', compact('pesan'));
    }

    public function update_publish_status(Request $request) {
        $status = $request->input('status');
        dd($status);
        return redirect()->back();
    }

    public function edit($id) {

        $pesan = Pesan::findOrFail($id);

        return view('akademik.pesan.edit', compact('pesan'));
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
