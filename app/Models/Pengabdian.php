<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    use HasFactory;

    protected $table = "pengabdian";

    protected $fillable = [
        'judul_pengabdian',
        'bidang_keilmuan',
        'latar_belakang',
        'manfaat',
        'sasaran',
        'tahun_pelaksanaan',
        'lama_kegiatan',
        'lokasi_pelaksanaan',
        'biaya_kegiatan',
        'target',
        'kendala',
        'hasil',
        'evaluasi',
        'link_publikasi',
        'surat_tugas',
        'laporan_kegiatan',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
