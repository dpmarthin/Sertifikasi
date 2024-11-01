<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap', 
        'alamat_KTP',
        'alamat_lengkap',
        'provinsi',  
        'kota_kabupaten', 
        'kecamatan', 
        'nomor_telepon',
        'nomor_hp',
        'email', 
        'kewarganegaraan',
        'tanggal_lahir',
        'tempat_lahir',  
        'negara_lahir', 
        'jenis_kelamin', 
        'status_menikah',
        'agama',
        'foto_mahasiswa',
        'status',
        'mahasiswa_id'
    ];

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
