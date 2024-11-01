@extends('layout.adminmaster')
@section('title', 'List User')
@section('content')
{{-- message --}}

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title" style="color:#3d5ee1;">List User</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">List User</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="student-group-form">
                <form action="{{ route('admin_management_user_index') }}" method="get">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search by Email" name="email" value="{{ request()->email }}">
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
                                        <h3 class="page-title">List User</h3>
                                    </div>                               
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread">
                                        <tr>
                                            <th style="text-align: center;">Email</th>
                                            <th style="text-align: center;">Verification Status</th>
                                            <th style="text-align: center;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswas as $mahasiswa)
                                        <tr>
                                            {{-- <td>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="something">
                                                </div>
                                            </td> --}}                                        
                                            <td style="text-align: center;">{{ $mahasiswa->email }}</td>
                                            <td style="text-align: center;">{{ ucfirst($mahasiswa->is_verified) }}</td>
                                            <td style="text-align: center;">
                                                <div class="actions">
                                                    <a href="javascript:void(0);" 
                                                       onclick="editUser('{{ route('admin_management_user_edit', $mahasiswa->id) }}')" 
                                                       class="btn btn-sm bg-danger-light">
                                                        <i class="far fa-edit me-2"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" 
                                                       class="btn btn-sm bg-danger-light delete" 
                                                       data-bs-toggle="modal" 
                                                       data-bs-target="#delete" 
                                                       data-id="{{ $mahasiswa->id }}">
                                                        <i class="fe fe-trash-2"></i>
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

    <!-- Modal Delete -->
    <div class="modal custom-modal fade" id="delete" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Hapus Pengguna</h3>
                        <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            @if($mahasiswa)
                                <form action="{{ route('admin_management_user_delete', $mahasiswa->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" id="">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary paid-continue-btn" style="width: 100%;">Yakin</button>
                                        </div>
                                        <div class="col-6">
                                            <a data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Tidak</a>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        {{-- delete js --}}
        <script>
            // Edit function to handle edit button click without displaying URL
            function editUser(url) {
                window.location.href = url;
            }

            $(document).on('click','.delete',function()
            {
                $('input[name="id"]').val($(this).data('id'));
            });
        </script>
    @endsection

@endsection