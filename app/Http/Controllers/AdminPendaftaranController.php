<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use PDF;

class AdminPendaftaranController extends Controller
{
    // Menampilkan daftar pendaftaran
    public function index(Request $request) {
        $query = Pendaftaran::query();

        if ($request->has('nama_lengkap')) {
            $query->where('nama_lengkap', 'like', '%' . $request->nama_lengkap . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $pendaftarans = $query->get();
        return view('admin.pendaftaran.listPendaftaran', compact('pendaftarans'));
    }

    // Menampilkan form edit status pendaftaran
    public function edit($id) {
        $pendaftarans = Pendaftaran::findOrFail($id);

        // Fetch provinces, cities, and districts for select options
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

        return view('admin.pendaftaran.editPendaftaran', compact('pendaftarans', 'provinsis', 'kabupatens', 'kecamatans'));
    }

    // Mengupdate status pendaftaran
    public function update(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:Pending,Approved',
        ]);

        $pendaftarans = Pendaftaran::findOrFail($id);
        $pendaftarans->status = $request->status;
        $updatePendaftaran = $pendaftarans->update();

        if ($updatePendaftaran) {
            return redirect(route('admin_pendaftaran_index'))->with('success', 'Pendaftaran berhasil diperbaharui');
        } else {
            return redirect(route('admin_pendaftaran_index'))->with('error', 'Pendaftaran gagal diperbaharui');
        }
    }

    // Menghapus data pendaftaran
    public function destroy($id) {
        $pendaftarans = Pendaftaran::findOrFail($id);
        $deletePendaftaran = $pendaftarans->delete();

        if ($deletePendaftaran) {
            return redirect(route('admin_pendaftaran_index'))->with('success', 'Pendaftaran berhasil dihapus');
        } else {
            return redirect(route('admin_pendaftaran_index'))->with('error', 'Pendaftaran gagal dihapus');
        }
    }

    // Menampilkan daftar pendaftaran yang statusnya Approved
    public function approvedIndex(Request $request) {
        $query = Pendaftaran::where('status', 'Approved');

        if ($request->has('nama_lengkap')) {
            $query->where('nama_lengkap', 'like', '%' . $request->nama_lengkap . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $pendaftarans = $query->get();
        return view('admin.pendaftaran.approvedPendaftaran', compact('pendaftarans'));
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

        return view('admin.pendaftaran.detailApproved', compact('pendaftarans', 'provinsis', 'kabupatens', 'kecamatans'));
    }

    public function generateApprovedPdf($id) {
        $pendaftarans = Pendaftaran::findOrFail($id);
    
        // Menggabungkan nama depan dan nama belakang untuk setiap wilayah
        $provinsi = Provinsi::find($pendaftarans->provinsi);
        $provinsiNamaLengkap = $provinsi ? $provinsi->nama_depan . ' ' . $provinsi->nama_belakang : '-';
        
        $kabupaten = Kabupaten::find($pendaftarans->kota_kabupaten);
        $kabupatenNamaLengkap = $kabupaten ? $kabupaten->nama_depan . ' ' . $kabupaten->nama_belakang : '-';
        
        $kecamatan = Kecamatan::find($pendaftarans->kecamatan);
        $kecamatanNamaLengkap = $kecamatan ? $kecamatan->nama_depan . ' ' . $kecamatan->nama_belakang : '-';
    
        // Generate path lengkap untuk foto mahasiswa
        $fotoPath = $pendaftarans->foto_mahasiswa ? public_path($pendaftarans->foto_mahasiswa) : null;
    
        // Generate PDF dari view dengan data gabungan
        $pdf = PDF::loadView('admin.pendaftaran.pdfApproved', compact('pendaftarans', 'provinsiNamaLengkap', 'kabupatenNamaLengkap', 'kecamatanNamaLengkap', 'fotoPath'));
    
        // Kembalikan download PDF
        return $pdf->download('Detail_Pendaftaran_Approved_' . $pendaftarans->nama_lengkap . '.pdf');
    }
}
