<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'cities';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mahasiswa_id',
        'province_id',
        'nama_depan',
        'nama_belakang'
    ];

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function Provinsi(){
        return $this->belongsTo(Provinsi::class, 'province_id');
    }
}
