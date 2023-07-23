<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenelitianController extends Controller
{
    public function index() {

        // Get Id User
        $user = Auth::user();

        $penelitian = Penelitian::where('user_id', $user->id)->paginate(5);

        return view('penelitian.index', [
            'penelitian' => $penelitian
        ]);
    }

    public function create() {

        return view('penelitian.create');
    }

    public function store(Request $request) {

        // Validasi Form
        $this->validate($request, [
            'status_peneliti' => 'required|string|max:255',
            'kelompok_bidang' => 'required|string|max:255',
            'judul_penelitian' => 'required|string|max:255',
            'lokasi_kegiatan' => 'required|string|max:255',
            'tahun_usulan' => 'required|string|max:255',
            'tahun_kegiatan' => 'required|string|max:255',
            'lama_kegiatan' => 'required|string|max:255',
            'jumlah_dana' => 'required|string|max:255',
            'sumber_dana' => 'required|string|max:255',
            'no_sk_penugasan' => 'required|string|max:255',
            'tanggal_sk_penugasan' => 'required|string|max:255',
            'link_publikasi' => 'required|string|max:255',
            'surat_tugas' => 'file|mimes:pdf|max:2048',
            'publikasi' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = Auth::user();

        // Kondisi jika surat tugas dan publikasi di upload

        if($request->hasFile('surat_tugas') && $request->hasFile('publikasi')) {

            // upload bukti surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/penelitian/surat_tugas', $surat_tugas->hashName());
            
            // upload publikasi
            $publikasi = $request->file('publikasi');
            $publikasi->storeAs('public/dosen/penelitian/publikasi', $publikasi->hashName());

            // Create Penelitian
            Penelitian::create([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'publikasi' => $publikasi->hashName(),
                'user_id' => $user->id
            ]);

        } else if($request->hasFile('surat_tugas')) {

            // upload bukti surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/penelitian/surat_tugas', $surat_tugas->hashName());

            // Create Penelitian
            Penelitian::create([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'user_id' => $user->id
            ]);

        } else if($request->hasFile('publikasi')) {
            
            // upload publikasi
            $publikasi = $request->file('publikasi');
            $publikasi->storeAs('public/dosen/penelitian/publikasi', $publikasi->hashName());

            // Create Penelitian
            Penelitian::create([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'publikasi' => $publikasi->hashName(),
                'user_id' => $user->id
            ]);
        } else {
            // Create Penelitian
            Penelitian::create([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('penelitian')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    public function destroy($id) {
        
        $penelitian = Penelitian::findOrFail($id);

        // hapus gambar bukti pengajaran dan bukti presensi
        Storage::delete('public/dosen/penelitian/surat_tugas/'. $penelitian->surat_tugas);
        Storage::delete('public/dosen/penelitian/publikasi/'. $penelitian->publikasi);
        
        // hapus penelitian
        $penelitian->delete();

        return redirect()->route('penelitian')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function edit($id) {

        $penelitian = Penelitian::findOrFail($id);

        return view('penelitian.edit', [
            'penelitian' => $penelitian
        ]);

    }

    public function view($id) {

        $penelitian = Penelitian::findOrFail($id);

        return view('penelitian.view', [
            'penelitian' => $penelitian
        ]);

    }

    public function update(Request $request, $id) {

        $penelitian = Penelitian::findOrFail($id);

        // Validasi Form
        $this->validate($request, [
            'status_peneliti' => 'required|string|max:255',
            'kelompok_bidang' => 'required|string|max:255',
            'judul_penelitian' => 'required|string|max:255',
            'lokasi_kegiatan' => 'required|string|max:255',
            'tahun_usulan' => 'required|string|max:255',
            'tahun_kegiatan' => 'required|string|max:255',
            'lama_kegiatan' => 'required|string|max:255',
            'jumlah_dana' => 'required|string|max:255',
            'sumber_dana' => 'required|string|max:255',
            'no_sk_penugasan' => 'required|string|max:255',
            'tanggal_sk_penugasan' => 'required|string|max:255',
            'link_publikasi' => 'required|string|max:255',
            'surat_tugas' => 'file|mimes:pdf|max:2048',
            'publikasi' => 'file|mimes:pdf|max:2048',
        ]);

        // Get Id User
        $user = Auth::user();

        // Kondisi jika surat tugas dan publikasi di upload

        if($request->hasFile('surat_tugas') && $request->hasFile('publikasi')) {

            // upload bukti surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/penelitian/surat_tugas', $surat_tugas->hashName());
            
            // upload publikasi
            $publikasi = $request->file('publikasi');
            $publikasi->storeAs('public/dosen/penelitian/publikasi', $publikasi->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/penelitian/surat_tugas/'. $penelitian->surat_tugas);
            Storage::delete('public/dosen/penelitian/publikasi/'. $penelitian->publikasi);


            // Create Penelitian
            $penelitian->update([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'publikasi' => $publikasi->hashName(),
                'user_id' => $user->id
            ]);

        } else if($request->hasFile('surat_tugas')) {

            // upload bukti surat tugas
            $surat_tugas = $request->file('surat_tugas');
            $surat_tugas->storeAs('public/dosen/penelitian/surat_tugas', $surat_tugas->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/penelitian/surat_tugas/'. $penelitian->surat_tugas);


            // Update Penelitian
            $penelitian->update([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'surat_tugas' => $surat_tugas->hashName(),
                'user_id' => $user->id
            ]);

        } else if($request->hasFile('publikasi')) {
            
            // upload publikasi
            $publikasi = $request->file('publikasi');
            $publikasi->storeAs('public/dosen/penelitian/publikasi', $publikasi->hashName());

            // Hapus file terdahulu
            Storage::delete('public/dosen/penelitian/publikasi/'. $penelitian->publikasi);


            // Update Penelitian
            $penelitian->update([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'publikasi' => $publikasi->hashName(),
                'user_id' => $user->id
            ]);
        } else {

            // Update Penelitian

            $penelitian->update([
                'status_peneliti' => $request->status_peneliti,
                'kelompok_bidang' => $request->kelompok_bidang,
                'judul_penelitian' => $request->judul_penelitian,
                'lokasi_kegiatan' => $request->lokasi_kegiatan,
                'tahun_usulan' => $request->tahun_usulan,
                'tahun_kegiatan' => $request->tahun_kegiatan,
                'lama_kegiatan' => $request->lama_kegiatan,
                'jumlah_dana' => $request->jumlah_dana,
                'sumber_dana' => $request->sumber_dana,
                'nomor_sk_penugasan' => $request->no_sk_penugasan,
                'tanggal_sk_penugasan' => $request->tanggal_sk_penugasan,
                'link_publikasi' => $request->link_publikasi,
                'user_id' => $user->id
            ]);
        }

        return redirect()->route('penelitian')->with(['success' => 'Data Berhasil Diupdate!']);

    }

}
