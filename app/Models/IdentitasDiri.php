<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasDiri extends Model
{
    use HasFactory;

    protected $table = 'identitas_diri';

    public function user() {
        return $this->belongsTo(User::class);
    }

}