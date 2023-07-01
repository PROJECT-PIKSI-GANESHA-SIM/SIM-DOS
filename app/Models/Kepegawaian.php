<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    use HasFactory;

    protected $table = 'kepegawaian';

    protected $fillable = [
        'program_studi',
        'status_kepegawaian',
        'status_keaktifan',
        'jabatan_fungsional',
        'no_sk_sertifikasi_dosen',
        'no_sk_tmmd',
        'tanggal_menjadi_dosen',
        'pangkat_golongan',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
