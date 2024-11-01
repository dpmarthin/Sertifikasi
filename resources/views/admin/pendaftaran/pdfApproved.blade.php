<!DOCTYPE html>
<html>
<head>
    <title>Detail Pendaftaran Approved</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .content { padding: 20px; }
        h3 { color: #3d5ee1; }
        label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="content">
        <h3>Detail Pendaftaran Approved</h3>

        {{-- Nama Lengkap --}}
        <p><label>Nama Lengkap:</label> {{ $pendaftarans->nama_lengkap }}</p>

        {{-- Alamat KTP --}}
        <p><label>Alamat KTP:</label> {{ strip_tags($pendaftarans->alamat_KTP) }}</p>

        {{-- Alamat Lengkap --}}
        <p><label>Alamat Lengkap:</label> {{ strip_tags($pendaftarans->alamat_lengkap) }}</p>

        {{-- Provinsi --}}
        <p><label>Provinsi:</label> {{ $provinsiNamaLengkap }}</p>

        {{-- Kabupaten/Kota --}}
        <p><label>Kota/Kabupaten:</label> {{ $kabupatenNamaLengkap }}</p>

        {{-- Kecamatan --}}
        <p><label>Kecamatan:</label> {{ $kecamatanNamaLengkap }}</p>

        {{-- Nomor Telepon --}}
        <p><label>Nomor Telepon:</label> {{ $pendaftarans->nomor_telepon }}</p>

        {{-- Nomor HP --}}
        <p><label>Nomor HP:</label> {{ $pendaftarans->nomor_hp }}</p>

        {{-- Email --}}
        <p><label>Email:</label> {{ $pendaftarans->email }}</p>

        {{-- Kewarganegaraan --}}
        <p><label>Kewarganegaraan:</label> {{ $pendaftarans->kewarganegaraan }}</p>

        {{-- Negara Lahir --}}
        <p><label>Negara Lahir:</label> {{ $pendaftarans->negara_lahir }}</p>

        {{-- Tanggal Lahir --}}
        <p><label>Tanggal Lahir:</label> {{ \Carbon\Carbon::parse($pendaftarans->tanggal_lahir)->format('Y-m-d') }}</p>

        {{-- Tempat Lahir --}}
        <p><label>Tempat Lahir:</label> {{ $pendaftarans->tempat_lahir }}</p>

        {{-- Jenis Kelamin --}}
        <p><label>Jenis Kelamin:</label> {{ $pendaftarans->jenis_kelamin }}</p>

        {{-- Status Menikah --}}
        <p><label>Status Menikah:</label> {{ $pendaftarans->status_menikah }}</p>

        {{-- Agama --}}
        <p><label>Agama:</label> {{ $pendaftarans->agama }}</p>

        {{-- Foto Mahasiswa --}}
        <p><label>Foto Mahasiswa:</label></p>
        @if($fotoPath)
            <div>
                <img src="{{ $fotoPath }}" alt="Foto Mahasiswa" style="width: 150px; height: auto;">
            </div>
        @else
            <p>Foto tidak tersedia.</p>
        @endif        

        {{-- Status --}}
        <p><label>Status:</label> {{ $pendaftarans->status }}</p>
    </div>
</body>
</html>
