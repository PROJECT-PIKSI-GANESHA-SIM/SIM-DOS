<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaianLuaran extends Model
{
    use HasFactory;

    protected $table = 'capaian_luaran';
    protected $fillable = [
        'jenis_luaran',
        'judul_karya',
        'tanggal',
        'tautan_eksternal',
        'upload_document',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
