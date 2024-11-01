<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'email',
        'password',
        'is_verified'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        // Set default value for is_verified on model creation
        static::creating(function ($mahasiswa) {
            $mahasiswa->is_verified = 'pending';
        });
    }

    public function Pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function Provinsi()
    {
        return $this->hasOne(Provinsi::class);
    }

    public function Kabupaten()
    {
        return $this->hasOne(Kabupaten::class);
    }

    public function Kecamatan()
    {
        return $this->hasOne(Kecamatan::class);
    }
}

