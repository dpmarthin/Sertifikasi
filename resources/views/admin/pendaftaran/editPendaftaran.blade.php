@extends('layout.adminmaster')
@section('title', 'Edit Pendaftaran')
@section('content')
{{-- message --}}

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Edit Pendaftaran</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/pendaftaran">List Pendaftaran</a></li>
                        <li class="breadcrumb-item active">Edit Pendaftaran</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form action="{{ route('admin_pendaftaran_update', $pendaftarans->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- Nama Lengkap --}}
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ $pendaftarans->nama_lengkap }}" readonly>
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat KTP --}}
                            <div class="mb-3">
                                <label for="alamat_KTP" class="form-label">Alamat KTP</label>
                                <textarea class="form-control summernote @error('alamat_KTP') is-invalid @enderror" id="alamat_KTP" name="alamat_KTP" rows="3" readonly>{{ strip_tags($pendaftarans->alamat_KTP) }}</textarea>
                                @error('alamat_KTP')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alamat Lengkap --}}
                            <div class="mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control summernote @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" name="alamat_lengkap" rows="3" readonly>{{ strip_tags($pendaftarans->alamat_lengkap) }}</textarea>
                                @error('alamat_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Provinsi --}}
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-select @error('provinsi') is-invalid @enderror" readonly disabled>
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsis as $provinsi)
                                        <option value="{{ $provinsi->id }}" {{ $pendaftarans->provinsi == $provinsi->id ? 'selected' : '' }}>{{ $provinsi->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                @error('provinsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kabupaten/Kota --}}
                            <div class="mb-3">
                                <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
                                <select id="kota_kabupaten" name="kota_kabupaten" class="form-select @error('kota_kabupaten') is-invalid @enderror" readonly disabled>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach($kabupatens as $kabupaten)
                                        <option value="{{ $kabupaten->id }}" data-provinsi="{{ $kabupaten->province_id }}" {{ $pendaftarans->kota_kabupaten == $kabupaten->id ? 'selected' : '' }}>{{ $kabupaten->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                @error('kota_kabupaten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kecamatan --}}
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror" readonly disabled>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}" data-kabupaten="{{ $kecamatan->cities_id }}" {{ $pendaftarans->kecamatan == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nomor Telepon --}}
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ $pendaftarans->nomor_telepon }}" readonly>
                                @error('nomor_telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nomor HP --}}
                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" value="{{ $pendaftarans->nomor_hp }}" readonly>
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $pendaftarans->email }}" readonly>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Kewarganegaraan --}}
                            <div class="mb-3">
                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <select id="kewarganegaraan" name="kewarganegaraan" class="form-select @error('kewarganegaraan') is-invalid @enderror" disabled>
                                    <option value=""></option>
                                    <option value="WNI Asli" {{ $pendaftarans->kewarganegaraan == 'WNI Asli' ? 'selected' : '' }}>WNI Asli</option>
                                    <option value="WNI Keturunan" {{ $pendaftarans->kewarganegaraan == 'WNI Keturunan' ? 'selected' : '' }}>WNI Keturunan</option>
                                    <option value="WNA" {{ $pendaftarans->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA</option>
                                </select>
                                @error('kewarganegaraan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Negara Lahir --}}
                            <div class="mb-3">
                                <label for="negara_lahir" class="form-label">Negara Lahir</label>
                                <input type="text" class="form-control @error('negara_lahir') is-invalid @enderror" id="negara_lahir" name="negara_lahir" value="{{ $pendaftarans->negara_lahir }}" readonly>
                                @error('negara_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ \Carbon\Carbon::parse($pendaftarans->tanggal_lahir)->format('Y-m-d') }}" readonly>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tempat Lahir --}}
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ $pendaftarans->tempat_lahir }}" readonly>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" disabled>
                                    <option value=""></option>
                                    <option value="Pria" {{ $pendaftarans->jenis_kelamin == 'Pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="Wanita" {{ $pendaftarans->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status Menikah --}}
                            <div class="mb-3">
                                <label for="status_menikah" class="form-label">Status Menikah</label>
                                <select id="status_menikah" name="status_menikah" class="form-select @error('status_menikah') is-invalid @enderror" disabled>
                                    <option value=""></option>
                                    <option value="Belum Menikah" {{ $pendaftarans->status_menikah == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                    <option value="Menikah" {{ $pendaftarans->status_menikah == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="Janda/Duda" {{ $pendaftarans->status_menikah == 'Janda/Duda' ? 'selected' : '' }}>Lain-lain (janda/duda)</option>
                                </select>
                                @error('status_menikah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Agama --}}
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select id="agama" name="agama" class="form-select @error('agama') is-invalid @enderror" disabled>
                                    <option value=""></option>
                                    <option value="Islam" {{ $pendaftarans->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Katolik" {{ $pendaftarans->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                    <option value="Kristen" {{ $pendaftarans->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                    <option value="Hindu" {{ $pendaftarans->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Budha" {{ $pendaftarans->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                    <option value="Lain-lain" {{ $pendaftarans->agama == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
                                <input type="file" class="form-control @error('foto_mahasiswa') is-invalid @enderror" id="foto_mahasiswa" name="foto_mahasiswa" accept=".jpeg,.jpg,.png" readonly>
                                @error('foto_mahasiswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                    <option value="Pending" {{ $pendaftarans->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Approved" {{ $pendaftarans->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <span class="mx-2"></span>
                                <a class="btn btn-secondary" href="{{ route('admin_pendaftaran_index') }}">Back</a>
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

        // Mengaktifkan kota/kabupaten setelah provinsi diisi
        $('#kota_kabupaten').on('change', function() {
            var kabupatenId = $(this).val();
            $('#kecamatan').prop('disabled', kabupatenId === '');
            $('#kecamatan option').each(function() {
                $(this).toggle($(this).data('kabupaten') == kabupatenId);
            });
            $('#kecamatan').val('');

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