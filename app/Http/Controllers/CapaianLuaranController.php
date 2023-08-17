<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\CapaianLuaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CapaianLuaranController extends Controller
{
    public function index () {
        $user = Auth::user();
        $pesan = Pesan::all();
        $capaian_luaran = CapaianLuaran::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('menu_capaian_luaran.index', [
            'pesan' => $pesan,
            'user' => $user,
            'capaian_luaran' => $capaian_luaran
        ]);
    }

    public function create() {
        $user = Auth::user();

        return view('menu_capaian_luaran.create', [
            'user' => $user
        ]);
    }

    public function store(Request $request) {
        // validasi form
        $this->validate($request, [
            'jenis_luaran' => 'required|string|max:255',
            'judul_karya' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'tautan_eksternal' => 'required|string|max:255',
            'upload_document' => 'file|mimes:pdf|max:2048',
        ]);
        // Get Id User
        $user = Auth::user();

        // kondisi jika kedua file di uplaod
        if($request->hasFile('upload_document')) {

            // upload file ijazah
            $upload_document = $request->file('upload_document');
            $upload_document->storeAs('public/dosen/capaian_luaran/upload_document', $upload_document->hashName());

            // create menu penunjang
            CapaianLuaran::create([
                'jenis_luaran' => $request->jenis_luaran,
                'judul_karya' => $request->judul_karya,
                'tanggal' => $request->tanggal,
                'tautan_eksternal' => $request->tautan_eksternal,
                'upload_document' => $upload_document->hashName(),
                'user_id' => $user->id,
            ]);

        } else {

            // kondisi jika tikak mengupload file

            // create menu capaian luaran
            CapaianLuaran::create([
                'jenis_luaran' => $request->jenis_luaran,
                'judul_karya' => $request->judul_karya,
                'tanggal' => $request->tanggal,
                'tautan_eksternal' => $request->tautan_eksternal,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('capaian_luaran')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function edit ($id) {

        $user = Auth::user();
        $pesan = Pesan::all();
        $capaian_luaran = CapaianLuaran::findOrFail($id);

        return view('menu_capaian_luaran.edit', [
            'pesan' => $pesan,
            'user' => $user,
            'capaian_luaran' => $capaian_luaran
        ]);
    }

    public function update(Request $request, $id) {

        $capaian_luaran = CapaianLuaran::findOrFail($id);

        // validasi form
        $this->validate($request, [
            'jenis_luaran' => 'required|string|max:255',
            'judul_karya' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'tautan_eksternal' => 'required|string|max:255',
            'upload_document' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = Auth::user();

        // kondisi jika file ijazah dan transkirp nilai di upload
        if($request->hasFile('upload_document')) {

            // upload file ijazah
            $upload_document = $request->file('upload_document');
            $upload_document->storeAs('public/dosen/capaian_luaran/upload_document', $upload_document->hashName());

            Storage::delete('public/dosen/capaian_luaran/upload_document/'. $capaian_luaran->upload_document);

            // update pendidikan
            $capaian_luaran->update([
                'jenis_luaran' => $request->jenis_luaran,
                'judul_karya' => $request->judul_karya,
                'tanggal' => $request->tanggal,
                'tautan_eksternal' => $request->tautan_eksternal,
                'upload_document' => $upload_document->hashName(),
                'user_id' => $user->id,
            ]);

        } else {

            // kondisi ketika tikak mengupload file

            // update pendidikan
            $capaian_luaran->update([
                'jenis_luaran' => $request->jenis_luaran,
                'judul_karya' => $request->judul_karya,
                'tanggal' => $request->tanggal,
                'tautan_eksternal' => $request->tautan_eksternal,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('capaian_luaran')->with(['success' => 'Data Berhasil Diupdate!']);

    }

    public function destroy($id) {
        $capaian_luaran = CapaianLuaran::findOrFail($id);

        // hapus file surat tugas dan laporan kegiatan
        Storage::delete('public/dosen/capaian_luaran/upload_document/'. $capaian_luaran->upload_document);

        // hapus pengajaran
        $capaian_luaran->delete();

        return redirect()->route('capaian_luaran',)->with(['success' => 'Data Berhasil Didelete!']);
    }

}
