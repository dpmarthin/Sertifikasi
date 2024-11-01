<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Mahasiswa;
use App\Observers\MahasiswaObserver;
use App\Models\Pendaftaran;
use App\Observers\PendaftaranObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Mahasiswa::observe(MahasiswaObserver::class);
        Pendaftaran::observe(PendaftaranObserver::class);
    }
}
