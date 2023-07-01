<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LainLain extends Model
{
    use HasFactory;

    protected $table = 'lain_lain';

    protected $fillable = [
        'npwp',
        'nama_wajib_pajak',
        'sinta_id',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
