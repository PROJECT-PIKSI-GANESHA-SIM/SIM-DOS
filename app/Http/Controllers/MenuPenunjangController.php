<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\MenuPenunjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuPenunjangController extends Controller
{
    public function index () {

        $user = Auth::user();
        $pesan = Pesan::all();
        $menu_penunjang = MenuPenunjang::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('menu_penunjang.index', [
            'pesan' => $pesan,
            'user' => $user,
            'menu_penunjang' => $menu_penunjang
        ]);
    }

    public function create() {
        $user = Auth::user();


        return view('menu_penunjang.create', [
            'user' => $user
        ]);
    }

    public function store(Request $request) {
        // validasi form
        $this->validate($request, [
            'kategori_kegiatan' => 'required|string|max:255',
            'nama_kegiatan' => 'required|string|max:255',
            'pelaksanaan' => 'required|string|max:255',
            'upload_document' => 'file|mimes:pdf|max:2048',
        ]);
        // Get Id User
        $user = Auth::user();

        // kondisi jika kedua file di uplaod
        if($request->hasFile('upload_document')) {

            // upload file ijazah
            $upload_document = $request->file('upload_document');
            $upload_document->storeAs('public/dosen/menu_penunjang/upload_document', $upload_document->hashName());

            // create menu penunjang
            MenuPenunjang::create([
                'kategori_kegiatan' => $request->kategori_kegiatan,
                'nama_kegiatan' => $request->nama_kegiatan,
                'pelaksanaan' => $request->pelaksanaan,
                'upload_document' => $upload_document->hashName(),
                'user_id' => $user->id,
            ]);

        } else {

            // kondisi jika tikak mengupload file

            // create menu penunjang
            MenuPenunjang::create([
                'jenjang_pendidikan' => $request->jenjang_pendidikan,
                'kategori_kegiatan' => $request->kategori_kegiatan,
                'nama_kegiatan' => $request->nama_kegiatan,
                'pelaksanaan' => $request->pelaksanaan,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('menu_penunjang')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function edit ($id) {

        $user = Auth::user();
        $pesan = Pesan::all();
        $menu_penunjang = MenuPenunjang::findOrFail($id);

        return view('menu_penunjang.edit', [
            'pesan' => $pesan,
            'user' => $user,
            'menu_penunjang' => $menu_penunjang
        ]);
    }

    public function update(Request $request, $id) {

        $menu_penunjang = MenuPenunjang::findOrFail($id);

        // validasi form
        $this->validate($request, [
            'kategori_kegiatan' => 'required|string|max:255',
            'nama_kegiatan' => 'required|string|max:255',
            'pelaksanaan' => 'required|string|max:255',
            'upload_document' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = Auth::user();

        // kondisi jika file ijazah dan transkirp nilai di upload
        if($request->hasFile('upload_document')) {

            // upload file ijazah
            $upload_document = $request->file('upload_document');
            $upload_document->storeAs('public/dosen/menu_penunjang/upload_document', $upload_document->hashName());

            Storage::delete('public/dosen/menu_penunjang/upload_document/'. $menu_penunjang->upload_document);

            // update pendidikan
            $menu_penunjang->update([
                'jenjang_pendidikan' => $request->jenjang_pendidikan,
                'kategori_kegiatan' => $request->kategori_kegiatan,
                'nama_kegiatan' => $request->nama_kegiatan,
                'pelaksanaan' => $request->pelaksanaan,
                'upload_document' => $upload_document->hashName(),
                'user_id' => $user->id,
            ]);

        } else {

            // kondisi ketika tikak mengupload file

            // update pendidikan
            $menu_penunjang->update([
                'jenjang_pendidikan' => $request->jenjang_pendidikan,
                'kategori_kegiatan' => $request->kategori_kegiatan,
                'nama_kegiatan' => $request->nama_kegiatan,
                'pelaksanaan' => $request->pelaksanaan,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('menu_penunjang')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function destroy($id) {
        $menu_penunjang = MenuPenunjang::findOrFail($id);

        // hapus file surat tugas dan laporan kegiatan
        Storage::delete('public/dosen/menu_penunjang/upload_document/'. $menu_penunjang->upload_document);

        // hapus pengajaran
        $menu_penunjang->delete();

        return redirect()->route('menu_penunjang')->with(['success' => 'Data Berhasil Didelete!']);
    }

    public function view ($id) {

        $user = Auth::user();
        $pesan = Pesan::all();
        $menu_penunjang = MenuPenunjang::findOrFail($id);

        return view('menu_penunjang.view', [
            'pesan' => $pesan,
            'user' => $user,
            'menu_penunjang' => $menu_penunjang
        ]);
    }
}
