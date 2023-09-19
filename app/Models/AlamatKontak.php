<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatKontak extends Model
{
    use HasFactory;

    protected $table = 'alamat_kontak';

    protected $fillable = [
        'alamat',
        'rt',
        'rw',
        'no',
        'desa_kelurahan',
        'kecamatan',
        'kota_kabupaten',
        'provinsi',
        'tempat_lahir',
        'kode_pos',
        'no_telepon_rumah',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
