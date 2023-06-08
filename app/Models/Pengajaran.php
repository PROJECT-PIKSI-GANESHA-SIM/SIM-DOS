<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajaran extends Model
{
    use HasFactory;

    protected $table = 'pengajaran';

    protected $fillable = [
        'tahun_ajaran',
        'program_studi',
        'nama_mata_kuliah',
        'jenis_mata_kuliah',
        'kelas',
        'jumlah_sks',
        'jumlah_mahasiswa',
        'bukti_pengajaran',
        'bukti_presensi',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function program_studis() {
        return $this->belongsTo(ProgramStudi::class);
    }

}
