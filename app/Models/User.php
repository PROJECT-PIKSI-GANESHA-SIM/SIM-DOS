<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nidn',
        'name',
        'email',
        'no_telpn',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pengajaran() {
        return $this->hasMany(Pengajaran::class);
    }

    public function pendidikan() {
        return $this->hasMany(Pendidikan::class);
    }

    public function pengabdian() {
        return $this->hasMany(Pengabdian::class);
    }

    public function identitas_diri() {
        return $this->hasOne(IdentitasDiri::class);
    }

    public function alamat_kontak() {
        return $this->hasOne(alamat_kontak::class);
    }

    public function lain_lain() {
        return $this->hasOne(LainLain::class);
    }

    public function kepegawaian() {
        return $this->hasOne(Kepegawaian::class);
    }

    public function penelitian() {
        return $this->hasOne(Penelitian::class);
    }
}
