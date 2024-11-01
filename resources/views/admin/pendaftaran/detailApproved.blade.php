@extends('layout.adminmaster')
@section('title', 'Detail Pendaftaran Approved')
@section('content')
{{-- message --}}

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Detail Pendaftaran Approved</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin_pendaftaran_approved') }}">List Approved Pendaftaran</a></li>
                        <li class="breadcrumb-item active">Detail Pendaftaran Approved</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form>
                            {{-- Nama Lengkap --}}
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $pendaftarans->nama_lengkap }}" readonly>
                            </div>

                            {{-- Alamat KTP --}}
                            <div class="mb-3">
                                <label for="alamat_KTP" class="form-label">Alamat KTP</label>
                                <textarea class="form-control summernote" id="alamat_KTP" name="alamat_KTP" rows="3" readonly>{{ strip_tags($pendaftarans->alamat_KTP) }}</textarea>
                            </div>

                            {{-- Alamat Lengkap --}}
                            <div class="mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control summernote" id="alamat_lengkap" name="alamat_lengkap" rows="3" readonly>{{ strip_tags($pendaftarans->alamat_lengkap) }}</textarea>
                            </div>

                            {{-- Provinsi --}}
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-select" disabled>
                                    @foreach($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}" {{ $pendaftarans->provinsi == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Kabupaten/Kota --}}
                            <div class="mb-3">
                                <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
                                <select id="kota_kabupaten" name="kota_kabupaten" class="form-select" disabled>
                                    @foreach($kabupatens as $kabupaten)
                                        <option value="{{ $kabupaten->id }}" data-provinsi="{{ $kabupaten->province_id }}" {{ $pendaftarans->kota_kabupaten == $kabupaten->id ? 'selected' : '' }}>{{ $kabupaten->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Kecamatan --}}
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="form-select" disabled>
                                    @foreach($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}" data-kabupaten="{{ $kecamatan->cities_id }}" {{ $pendaftarans->kecamatan == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Nomor Telepon --}}
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ $pendaftarans->nomor_telepon }}" readonly>
                            </div>

                            {{-- Nomor HP --}}
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ $pendaftarans->nomor_hp }}" readonly>
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $pendaftarans->email }}" readonly>
                            </div>

                            {{-- Kewarganegaraan --}}
                            <div class="mb-3">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="{{ $pendaftarans->kewarganegaraan }}" readonly>
                            </div>

                            {{-- Negara Lahir --}}
                            <div class="mb-3">
                                <label for="negara_lahir" class="form-label">Negara Lahir</label>
                                <input type="text" class="form-control" id="negara_lahir" name="negara_lahir" value="{{ $pendaftarans->negara_lahir }}" readonly>
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ \Carbon\Carbon::parse($pendaftarans->tanggal_lahir)->format('Y-m-d') }}" readonly>
                            </div>

                            {{-- Tempat Lahir --}}
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $pendaftarans->tempat_lahir }}" readonly>
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $pendaftarans->jenis_kelamin }}" readonly>
                            </div>

                            {{-- Status Menikah --}}
                            <div class="mb-3">
                                <label for="status_menikah" class="form-label">Status Menikah</label>
                                <input type="text" class="form-control" id="status_menikah" name="status_menikah" value="{{ $pendaftarans->status_menikah }}" readonly>
                            </div>

                            {{-- Agama --}}
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <input type="text" class="form-control" id="agama" name="agama" value="{{ $pendaftarans->agama }}" readonly>
                            </div>

                            {{-- Foto Mahasiswa --}}
                            <div class="mb-3">
                                <label for="foto_mahasiswa" class="form-label">Foto Mahasiswa</label>
                                @if($pendaftarans->foto_mahasiswa)
                                    <div class="my-2">
                                        <img src="{{ asset($pendaftarans->foto_mahasiswa) }}" alt="Foto Mahasiswa" style="width: 150px; height: auto;">
                                    </div>
                                @else
                                    <p>Foto tidak tersedia.</p>
                                @endif
                            </div>

                            {{-- Status --}}
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" value="{{ $pendaftarans->status }}" readonly>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-center">
                                <a class="btn btn-primary" href="{{ route('admin_pendaftaran_generate_pdf', $pendaftarans->id) }}" target="_blank">Generate PDF</a>
                                <span class="mx-2"></span>
                                <a class="btn btn-secondary" href="{{ route('admin_pendaftaran_approved') }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
