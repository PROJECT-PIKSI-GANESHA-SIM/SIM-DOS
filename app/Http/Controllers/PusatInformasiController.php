<?php

namespace App\Http\Controllers;

use App\Models\PusatInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PusatInformasiController extends Controller
{
    public function index(Request $request)
    {
        $query = PusatInformasi::orderBy('updated_at', 'desc');

        if ($request->has('filter') && $request->filter == 'terbaru') {
            $query->orderBy('created_at', 'desc');
        }

        $pusat_informasi = $query->paginate(5);
        $user = Auth::user();

        return view('akademik.pusat_informasi.index', [
            'pusat_informasi' => $pusat_informasi,
            'user' => $user
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('akademik.pusat_informasi.create', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {

        // Validasi Form
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Kondisi jika bukti pengajaran dan bukti presensi di upload
        if ($request->hasFile('thumbnail')) {

            // upload bukti pengajaran
            $thumbnail = $request->file('thumbnail');
            $thumbnail->storeAs('public/akademik/pusat_informasi', $thumbnail->hashName());

            // Create Pusat Informasi
            PusatInformasi::create([
                'title' => $request->title,
                'date' => $request->tanggal,
                'description' => $request->description,
                'thumbnail' => $thumbnail->hashName(),
                'status' => 0,
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

    public function edit($id)
    {

        $pusat_informasi = PusatInformasi::findOrFail($id);
        $user = Auth::user();

        return view('akademik.pusat_informasi.edit', [
            'pusat_informasi' => $pusat_informasi,
            'user' => $user
        ]);
    }

    public function update_publish_status(Request $request)
    {
        $status = $request->status;
        $pusat_informasi = PusatInformasi::findOrFail($request->id);
        $pusat_informasi->status = $status;
        $pusat_informasi->save();
        return response()->json(['message' => 'Data updated successfully'], 200);
    }

    public function update(Request $request, $id)
    {

        $pusat_informasi = PusatInformasi::findOrFail($id);

        // Validasi Form
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'tanggal' => 'required|string|max:255',
            'description' => 'required|string|max:10000',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get Id User
        $user = Auth::user();

        if ($request->hasFile('thumbnail')) {

            // upload bukti presensi
            $thumbnail = $request->file('thumbnail');
            $thumbnail->storeAs('public/akademik/pusat_informasi', $thumbnail->hashName());

            // Hapus image terdahulu
            Storage::delete('public/akademik/pusat_informasi/' . $pusat_informasi->thumbnail);

            // Update Pusat Informasi
            $pusat_informasi->update([
                'title' => $request->title,
                'tanggal' => $request->tanggal,
                'description' => $request->description,
                'thumbnail' => $thumbnail->hashName(),
            ]);
        } else {
            // kondisi jika tidak mengupdate image

            // Update Pusat Informasi
            $pusat_informasi->update([
                'title' => $request->title,
                'tanggal' => $request->tanggal,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('pusat_informasi')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id)
    {
        $pusat_informasi = PusatInformasi::findOrFail($id);

        // hapus file surat tugas dan laporan kegiatan
        Storage::delete('public/akademik/pusat_infomasi/' . $pusat_informasi->thumbnail);

        // hapus pengajaran
        $pusat_informasi->delete();

        return redirect()->route('pusat_informasi')->with(['success' => 'Data Berhasil Didelete!']);
    }

    // External

    public function show_all()
    {

        $pusat_informasi = PusatInformasi::where('status', 1)->orderBy('updated_at', 'desc')->paginate(6);

        return view('informationcenter', [
            "title" => "Pusat Informasi",
            "pusat_informasi" => $pusat_informasi
        ]);
    }

    public function detail($id)
    {
        $pusat_informasi = PusatInformasi::findOrFail($id);
        return view('detail_informationcenter', [
            "title" => "Pusat Informasi",
            "pusat_informasi" => $pusat_informasi
        ]);
    }
}
