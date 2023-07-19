<?php

namespace App\Http\Controllers;

use App\Models\PusatInformasi;
use Illuminate\Http\Request;

class PusatInformasiController extends Controller
{
    public function index() {
        return view('akademik.pusat_informasi.index');
    }

    public function create() {
        return view('akademik.pusat_informasi.create');
    }

    public function store(Request $request) {

        // Validasi Form
        $this->validate($request, [
            'title' => 'required',
            'tanggal' => 'required',
            'description' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Kondisi jika bukti pengajaran dan bukti presensi di upload
        if($request->hasFile('thumbnail')) {
            
            // upload bukti pengajaran
            $thumbnail = $request->file('thumbnail');
            $thumbnail->storeAs('public/akademik/pusat_informasi', $thumbnail->hashName());
            
            // Create Pusat Informasi
            PusatInformasi::create([
                'title' => $request->title,
                'date' => $request->tanggal,
                'description' => $request->description,
                'thumbnail' => $thumbnail->hashName(),
            ]);

        } else {

            // Create Pengajaran
            PusatInformasi::create([
                'title' => $request->title,
                'date' => $request->tanggal,
                'description' => $request->description
            ]);

        }

        return redirect()->route('pusat_informasi')->with(['success' => 'Data Berhasil Diupdate!']);

    }
}
