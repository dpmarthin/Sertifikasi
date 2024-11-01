<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;

class AdminDashboardController extends Controller
{
    public function index(){
        $data_mahasiswa = Mahasiswa::all();

        $data_pendaftaran = Pendaftaran::all();

        return view('dashboard.admin_dashboard', compact('data_mahasiswa', 'data_pendaftaran'));
    }
}
