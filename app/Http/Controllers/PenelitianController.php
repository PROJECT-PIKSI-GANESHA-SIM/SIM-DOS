<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenelitianController extends Controller
{
    public function index() {
        $penelitian = Penelitian::all();
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
            'status_peneliti' => 'required',
            'kelompok_bidang' => 'required',
            'judul_penelitian' => 'required',
            'lokasi_kegiatan' => 'required',
            'tahun_usulan' => 'required',
            'tahun_kegiatan' => 'required',
            'lama_kegiatan' => 'required',
            'jumlah_dana' => 'required',
            'sumber_dana' => 'required',
            'no_sk_penugasan' => 'required',
            'tanggal_sk_penugasan' => 'required',
            'link_publikasi' => 'required',
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


}
