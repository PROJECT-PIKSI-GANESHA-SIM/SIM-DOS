<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PusatInformasi extends Model
{
    use HasFactory;

    protected $table= 'pusat_informasi';

    protected $fillable = [
        'title',
        'thumbnail',
        'date',
        'description',
        'status'
    ];
}
