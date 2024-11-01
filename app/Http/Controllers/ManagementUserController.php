<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;

class ManagementUserController extends Controller
{
    public function index(Request $request) {
        $query = Mahasiswa::query();

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $mahasiswas = $query->get();
        return view('admin.user.listUser', compact('mahasiswas'));
    }

    // Display edit form for mahasiswa, including is_verified
    public function edit($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.user.editUser', compact('mahasiswa'));
    }

    // Update mahasiswa data including is_verified
    public function update(Request $request, $id) {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:mahasiswa,email,' . $id,
            'password' => 'nullable|string|min:8',
            'is_verified' => 'required|string|in:pending,verified',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->email = $request->email;
        $mahasiswa->is_verified = $request->is_verified;

        if ($request->filled('password')) {
            $mahasiswa->password = Hash::make($request->password);
        }

        if ($mahasiswa->save()) {
            return redirect()->route('admin_management_user_index')->with('success', 'User berhasil diperbaharui');
        } else {
            return redirect()->route('admin_management_user_index')->with('error', 'User gagal diperbaharui');
        }
    }

    // Menghapus data mahasiswa
    public function destroy($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $deleteMahasiswa = $mahasiswa->delete();

        if ($deleteMahasiswa) {
            return redirect()->route('admin_management_user_index')->with('success', 'User berhasil dihapus');
        } else {
            return redirect()->route('admin_management_user_index')->with('error', 'User gagal dihapus');
        }
    }
}
