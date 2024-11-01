@extends('layout.master')
@section('title', 'Add Pendaftaran')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Tambah Pendaftaran</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/pendaftaran">List Pendaftaran</a></li>
                        <li class="breadcrumb-item active">Tambah Pendaftaran</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Tampilkan semua pesan error secara umum --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form action="{{ route('pendaftaran_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            {{-- Nama Lengkap --}}
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat KTP --}}
                            <div class="mb-3">
                                <label for="alamat_KTP" class="form-label">Alamat KTP</label>
                                <textarea class="form-control summernote @error('alamat_KTP') is-invalid @enderror" id="alamat_KTP" name="alamat_KTP" rows="3" required>{{ old('alamat_KTP') }}</textarea>
                                @error('alamat_KTP')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat Lengkap --}}
                            <div class="mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control summernote @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" name="alamat_lengkap" rows="3" required>{{ old('alamat_lengkap') }}</textarea>
                                @error('alamat_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Provinsi --}}
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-select @error('provinsi') is-invalid @enderror" required>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}" {{ old('provinsi') == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kota/Kabupaten --}}
                            <div class="mb-3">
                                <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
                                <select id="kota_kabupaten" name="kota_kabupaten" class="form-select @error('kota_kabupaten') is-invalid @enderror" disabled required>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach($kabupatens as $kabupaten)
                                        <option value="{{ $kabupaten->id }}" data-provinsi="{{ $kabupaten->province_id }}" {{ old('kota_kabupaten') == $kabupaten->id ? 'selected' : '' }}>{{ $kabupaten->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                @error('kota_kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kecamatan --}}
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror" disabled required>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}" data-kabupaten="{{ $kecamatan->cities_id }}" {{ old('kecamatan') == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nomor Telepon --}}
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" pattern="\d*" inputmode="numeric" value="{{ old('nomor_telepon') }}" required>
                                @error('nomor_telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nomor HP --}}
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" pattern="\d*" inputmode="numeric" value="{{ old('nomor_hp') }}" required>
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <select id="kewarganegaraan" name="kewarganegaraan" class="form-select" required>
                                    <option value=""></option>
                                    <option value="WNI Asli">WNI Asli</option>
                                    <option value="WNI Keturunan">WNI Keturunan</option>
                                    <option value="WNA">WNA</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="negara_lahir" class="form-label">Negara Lahir</label>
                                <input type="text" class="form-control" id="negara_lahir" name="negara_lahir">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                                    <option value=""></option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status_menikah" class="form-label">Status Menikah</label>
                                <select id="status_menikah" name="status_menikah" class="form-select" required>
                                    <option value=""></option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Lain-lain (janda/duda)">Lain-lain (janda/duda)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select id="agama" name="agama" class="form-select" required>
                                    <option value=""></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>
                            {{-- Foto Mahasiswa --}}
                            <div class="mb-3">
                                <label for="foto_mahasiswa" class="form-label">Foto Mahasiswa</label>
                                <input type="file" class="form-control @error('foto_mahasiswa') is-invalid @enderror" id="foto_mahasiswa" name="foto_mahasiswa" accept=".jpeg,.jpg,.png" required>
                                @error('foto_mahasiswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <span class="mx-2"></span>
                                <a class="btn btn-secondary" href="{{ route('pendaftaran_index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#provinsi').on('change', function() {
            var provinsiId = $(this).val();
            $('#kota_kabupaten').prop('disabled', provinsiId === '');
            $('#kota_kabupaten option').each(function() {
                $(this).toggle($(this).data('provinsi') == provinsiId);
            });
            $('#kota_kabupaten').val('');
            $('#kecamatan').prop('disabled', true).val('');
        });

        $('#kota_kabupaten').on('change', function() {
            var kabupatenId = $(this).val();
            $('#kecamatan').prop('disabled', kabupatenId === '');
            $('#kecamatan option').each(function() {
                $(this).toggle($(this).data('kabupaten') == kabupatenId);
            });
            $('#kecamatan').val('');
        });

        // Mengaktifkan atau menonaktifkan field negara lahir berdasarkan kewarganegaraan
        $('#kewarganegaraan').on('change', function() {
            if ($(this).val() === 'WNA') {
                $('#negara_lahir').prop('disabled', false);
            } else {
                $('#negara_lahir').prop('disabled', true).val('');
            }
        });
    });
    
    $('.summernote').summernote({
      placeholder: 'Type here',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'strikethrough', 'clear']],
        ['color', ['color']],
        ['para', ['paragraph']],
        ['table', ['table']],
        ['insert', ['picture']],
        ['view', ['codeview', 'help']],
        ['height', ['height']]
      ]
    });
</script>
@endsection