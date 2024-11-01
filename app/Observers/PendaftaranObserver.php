<?php

namespace App\Observers;

use App\Models\Pendaftaran;

class PendaftaranObserver
{
    public function created(Pendaftaran $pendaftaran)
    {
        // Trigger setiap kali data pendaftaran ditambahkan
        \Log::info("Pendaftaran baru ditambahkan untuk mahasiswa ID: " . $pendaftaran->mahasiswa_id);
    }

    public function updated(Pendaftaran $pendaftaran)
    {
        // Trigger setiap kali data pendaftaran diperbarui
        \Log::info("Pendaftaran diperbarui untuk mahasiswa ID: " . $pendaftaran->mahasiswa_id);
    }

    public function deleted(Pendaftaran $pendaftaran)
    {
        // Trigger setiap kali data pendaftaran dihapus
        \Log::info("Pendaftaran dihapus untuk mahasiswa ID: " . $pendaftaran->mahasiswa_id);
    }
}
