<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;

    protected $table = 'penelitian';

    protected $fillable = [
        'status_peneliti',
        'kelompok_bidang',
        'judul_penelitian',
        'lokasi_kegiatan',
        'tahun_usulan',
        'tahun_kegiatan',
        'lama_kegiatan',
        'jumlah_dana',
        'sumber_dana',
        'nomor_sk_penugasan',
        'tanggal_sk_penugasan',
        'link_publikasi',
        'surat_tugas',
        'publikasi',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
