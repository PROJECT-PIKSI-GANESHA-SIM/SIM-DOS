<?php

namespace App\Http\Controllers;

use App\Models\PusatInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PusatInformasiController extends Controller
{
    public function index() {
        $pusat_informasi = PusatInformasi::paginate(5);
        $user = Auth::user();

        return view('akademik.pusat_informasi.index', [
            'pusat_informasi' => $pusat_informasi,
            'user' => $user
        ]);
    }

    public function create() {
        $user = Auth::user();
        return view('akademik.pusat_informasi.create', [
            'user' => $user
        ]);
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

            // Create Pusat Informasi
            PusatInformasi::create([
                'title' => $request->title,
                'date' => $request->tanggal,
                'description' => $request->description
            ]);

        }

        return redirect()->route('pusat_informasi')->with(['success' => 'Data Berhasil Diupdate!']);

    }
}
