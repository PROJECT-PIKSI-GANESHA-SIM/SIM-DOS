<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = "pendidikan";

    protected $fillable = [
        'jenjang_pendidikan',
        'bidang_studi',
        'nama_instansi',
        'lokasi_institusi',
        'dalam_luar_negeri',
        'nomor_ijazah',
        'predikat_kelulusan',
        'gelar_singkat',
        'gelar_panjang',
        'tanggal_mulai_studi',
        'tanggal_berakhir_studi',
        'judul_penelitian',
        'file_ijazah',
        'transkrip_nilai',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
