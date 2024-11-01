@extends('layout.adminmaster')
@section('title', 'Approved Pendaftaran')
@section('content')
{{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title" style="color:#3d5ee1;">Approved Pendaftaran</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Approved Pendaftaran</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="student-group-form">
                <form action="{{ route('admin_pendaftaran_approved') }}" method="get">
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

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Approved Pendaftaran</h3>
                                    </div>                               
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th style="text-align: center;">Nama Lengkap</th>
                                            <th style="text-align: center;">Email</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendaftarans as $pendaftaran)
                                        <tr>
                                            <td style="text-align: center;">{{ $pendaftaran->nama_lengkap }}</td>
                                            <td style="text-align: center;">{{ $pendaftaran->email }}</td>
                                            <td style="text-align: center;">{{ $pendaftaran->status }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="javascript:void(0);" 
                                                    onclick="detailPendaftaran('{{ route('admin_detail_approved', $pendaftaran->id) }}')" 
                                                    class="btn btn-sm bg-danger-light" dusk="detail-pendaftaran">
                                                        <i class="far fa-eye me-2"></i>
                                                    </a>
                                                </div>
                                            </td>
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

    @section('script')
        {{-- delete js --}}
        <script>
            // Function to handle edit button click without displaying URL
            function detailPendaftaran(url) {
                window.location.href = url;
            }
        </script>
    @endsection

@endsection