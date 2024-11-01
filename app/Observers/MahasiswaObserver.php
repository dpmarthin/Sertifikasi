<?php

namespace App\Observers;

use App\Models\Mahasiswa;

class MahasiswaObserver
{
    public function created(Mahasiswa $mahasiswa)
    {
        // Trigger setiap kali data mahasiswa ditambahkan
        \Log::info("Mahasiswa baru ditambahkan: " . $mahasiswa->nama);
    }

    public function updated(Mahasiswa $mahasiswa)
    {
        // Trigger setiap kali data mahasiswa diperbarui
        \Log::info("Mahasiswa diperbarui: " . $mahasiswa->nama);
    }

    public function deleted(Mahasiswa $mahasiswa)
    {
        // Trigger setiap kali data mahasiswa dihapus
        \Log::info("Mahasiswa dihapus: " . $mahasiswa->nama);
    }
}
