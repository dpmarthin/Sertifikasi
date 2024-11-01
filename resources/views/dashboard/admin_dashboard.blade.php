@extends('layout.adminmaster')
@section('title', 'Dashboard Admin')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Welcome Admin {{ Auth::guard('admin')->user()->email }}!</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- PKD-52 -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Mahasiswa</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('admin_management_user_index') }}" dusk="list-user" class="btn btn-primary">
                                        <i class="fas fa-clipboard-list"></i>
                                    </a>
                                </div>      
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        {{-- <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th> --}}
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Verification Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_mahasiswa as $mahasiswa)
                                        <tr>
                                            {{-- <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="something">
                                                </div>
                                            </td> --}}
                                            <td style="text-align: center;">{{ $mahasiswa->email }}</td>
                                            <td style="text-align: center;">{{ $mahasiswa->is_verified }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PKD-52 -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Pendaftaran</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('admin_pendaftaran_index') }}" dusk="list-pendaftaran" class="btn btn-primary">
                                        <i class="fas fa-clipboard-list"></i>
                                    </a>
                                </div>    
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table
                                class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        {{-- <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th> --}}
                                        <th style="text-align: center;">Nama Lengkap</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pendaftaran as $pendaftaran)
                                        <tr>
                                            {{-- <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="something">
                                                </div>
                                            </td> --}}
                                            <td style="text-align: center;">{{ $pendaftaran->nama_lengkap }}</td>
                                            <td style="text-align: center;">{{ $pendaftaran->email }}</td>
                                            <td style="text-align: center;">{{ $pendaftaran->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

  