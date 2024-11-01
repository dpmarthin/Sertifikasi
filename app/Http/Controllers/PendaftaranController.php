<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use PDF;

class PendaftaranController extends Controller
{
    public function index(Request $request) {
        $query = Pendaftaran::query();

        if ($request->has('nama_lengkap')) {
            $query->where('nama_lengkap', 'like', '%' . $request->nama_lengkap . '%');
        }
    
        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
    
        $pendaftarans = $query->get();
        
        return view('mahasiswa.listPendaftaran', compact('pendaftarans'));
    }    

    public function add() {
        $mahasiswaId = Auth::guard('mahasiswa')->id();
        $mahasiswa = Mahasiswa::find($mahasiswaId);
        $mahasiswaId = Auth::guard('mahasiswa')->id();
        $mahasiswa = Mahasiswa::find($mahasiswaId);
    
        // Ambil data provinsi dengan nama lengkap
        $provinsis = Provinsi::all()->map(function ($provinsi) {
            $provinsi->nama_lengkap = $provinsi->nama_depan . ' ' . $provinsi->nama_belakang;
            return $provinsi;
        });

        // Ambil data kabupaten dengan nama lengkap
        $kabupatens = Kabupaten::all()->map(function ($kabupaten) {
            $kabupaten->nama_lengkap = $kabupaten->nama_depan . ' ' . $kabupaten->nama_belakang;
            return $kabupaten;
        });

        // Ambil data kecamatan dengan nama lengkap
        $kecamatans = Kecamatan::all()->map(function ($kecamatan) {
            $kecamatan->nama_lengkap = $kecamatan->nama_depan . ' ' . $kecamatan->nama_belakang;
            return $kecamatan;
        });
    
        return view('mahasiswa.addPendaftaran', compact('mahasiswa', 'provinsis', 'kabupatens', 'kecamatans'));
    }    

    public function store(Request $request) {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat_KTP' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'provinsi' => 'required|exists:provinces,id',
            'kota_kabupaten' => 'required|exists:cities,id',
            'kecamatan' => 'required|exists:districts,id',
            'nomor_telepon' => 'required|numeric',
            'nomor_hp' => 'required|numeric',
            'email' => 'required|email|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'foto_mahasiswa' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Mengambil file foto mahasiswa
        $fotoPath = null;
        if ($request->hasFile('foto_mahasiswa')) {
            $fotoFile = $request->file('foto_mahasiswa');
            $fotoPathName = time() . '_' . $fotoFile->getClientOriginalName();
            $fotoPath = 'pendaftaran/foto_mahasiswa/' . $fotoPathName;
            $fotoFile->move(public_path('pendaftaran/foto_mahasiswa'), $fotoPathName);
        }

        // Menyimpan data pendaftaran
        $pendaftarans = new Pendaftaran();
        $pendaftarans->nama_lengkap = $request->nama_lengkap;
        $pendaftarans->alamat_KTP = $request->alamat_KTP;
        $pendaftarans->alamat_lengkap = $request->alamat_lengkap;
        $pendaftarans->provinsi = $request->provinsi;
        $pendaftarans->kota_kabupaten = $request->kota_kabupaten;
        $pendaftarans->kecamatan = $request->kecamatan;
        $pendaftarans->nomor_telepon = $request->nomor_telepon;
        $pendaftarans->nomor_hp = $request->nomor_hp;
        $pendaftarans->email = $request->email;
        $pendaftarans->kewarganegaraan = $request->kewarganegaraan;
        $pendaftarans->negara_lahir = $request->negara_lahir;
        $pendaftarans->tanggal_lahir = $request->tanggal_lahir;
        $pendaftarans->tempat_lahir = $request->tempat_lahir;
        $pendaftarans->jenis_kelamin = $request->jenis_kelamin;
        $pendaftarans->status_menikah = $request->status_menikah;
        $pendaftarans->agama = $request->agama;
        $pendaftarans->foto_mahasiswa = $fotoPath;
        
        // Status default untuk pendaftaran
        $pendaftarans->status = 'Pending';
        $pendaftarans->mahasiswa_id = Auth::guard('mahasiswa')->id();
        
        $pendaftarans->save();

        if ($pendaftarans) {
            return redirect('/pendaftaran/approved')->with('success', 'Pendaftaran berhasil ditambahkan');
        } else {
            return redirect('/pendaftaran/approved')->with('error', 'Pendaftaran gagal ditambahkan');
        }        
    }

    // Menampilkan daftar pendaftaran yang statusnya Approved
    public function approvedIndex(Request $request) {
        $mahasiswaId = Auth::guard('mahasiswa')->id(); // Mengambil ID mahasiswa yang sedang login
    
        $query = Pendaftaran::where('status', 'Approved')
                    ->where('mahasiswa_id', $mahasiswaId); // Filter by mahasiswa_id

        if ($request->has('nama_lengkap')) {
            $query->where('nama_lengkap', 'like', '%' . $request->nama_lengkap . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $pendaftarans = $query->get();
        return view('mahasiswa.approvedPendaftaran', compact('pendaftarans'));
    }    

    // Menampilkan detail pendaftaran berstatus Approved
    public function detailApproved($id) {
        $pendaftarans = Pendaftaran::findOrFail($id);

        $provinsis = Provinsi::all()->map(function ($provinsi) {
            $provinsi->nama_lengkap = $provinsi->nama_depan . ' ' . $provinsi->nama_belakang;
            return $provinsi;
        });

        $kabupatens = Kabupaten::all()->map(function ($kabupaten) {
            $kabupaten->nama_lengkap = $kabupaten->nama_depan . ' ' . $kabupaten->nama_belakang;
            return $kabupaten;
        });

        $kecamatans = Kecamatan::all()->map(function ($kecamatan) {
            $kecamatan->nama_lengkap = $kecamatan->nama_depan . ' ' . $kecamatan->nama_belakang;
            return $kecamatan;
        });

        return view('mahasiswa.detailApproved', compact('pendaftarans', 'provinsis', 'kabupatens', 'kecamatans'));
    }

    public function generatePdf($id) {
        $pendaftarans = Pendaftaran::findOrFail($id);

        // Menggabungkan nama depan dan belakang untuk setiap wilayah
        $provinsi = Provinsi::find($pendaftarans->provinsi);
        $provinsiNamaLengkap = $provinsi ? $provinsi->nama_depan . ' ' . $provinsi->nama_belakang : '-';
        
        $kabupaten = Kabupaten::find($pendaftarans->kota_kabupaten);
        $kabupatenNamaLengkap = $kabupaten ? $kabupaten->nama_depan . ' ' . $kabupaten->nama_belakang : '-';
        
        $kecamatan = Kecamatan::find($pendaftarans->kecamatan);
        $kecamatanNamaLengkap = $kecamatan ? $kecamatan->nama_depan . ' ' . $kecamatan->nama_belakang : '-';

        // Path foto mahasiswa
        $fotoPath = $pendaftarans->foto_mahasiswa ? public_path($pendaftarans->foto_mahasiswa) : null;

        // Generate PDF
        $pdf = PDF::loadView('mahasiswa.pdfApproved', compact('pendaftarans', 'provinsiNamaLengkap', 'kabupatenNamaLengkap', 'kecamatanNamaLengkap', 'fotoPath'));

        return $pdf->download('Detail_Pendaftaran_Approved_' . $pendaftarans->nama_lengkap . '.pdf');
    }
}
