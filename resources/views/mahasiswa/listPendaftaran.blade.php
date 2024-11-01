@extends('layout.master')
@section('title', 'List Pendaftaran')
@section('content')
{{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title" style="color:#3d5ee1;">Pendaftaran Saya</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">List Pendaftaran</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="student-group-form">
                <form action="{{ route('pendaftaran_index') }}" method="get">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Nama Lengkap" name="nama_lengkap" value="{{ request()->nama_lengkap ?? null }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Email" name="email" value="{{ request()->email ?? null }}">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="search-student-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- PKD-31 -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Pendaftaran</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('pendaftaran_add') }}" dusk="add-pendaftaran" class="btn btn-primary">
                                            <i class="fas fa-plus"></i>
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
                                        @foreach ($pendaftarans as $pendaftaran)
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
        </div>
    </div>
@endsection