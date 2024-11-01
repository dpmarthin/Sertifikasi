<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'districts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'mahasiswa_id',
        'cities_id',
        'nama_depan',
        'nama_belakang'
    ];

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function Kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'cities_id');
    }
}
