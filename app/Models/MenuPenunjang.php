<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPenunjang extends Model
{
    use HasFactory;

    protected $table = 'menu_penunjang';

    protected $fillable = [
        'kategori_kegiatan',
        'nama_kegiatan',
        'pelaksanaan',
        'upload_document',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
