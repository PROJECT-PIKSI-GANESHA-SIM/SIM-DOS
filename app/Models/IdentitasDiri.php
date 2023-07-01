<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasDiri extends Model
{
    use HasFactory;

    protected $table = 'identitas_diri';

    protected $fillable = [
        'nip',
        'nik',
        'nama',
        'jenis_kelamin',
        'golongan_darah',
        'kewarganegaraan',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
