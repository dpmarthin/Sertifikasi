@extends('layout.adminmaster')
@section('title', 'Edit User')
@section('content')
{{-- message --}}

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title" style="color:#3d5ee1;">Edit User</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard-admin">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin_management_user_index') }}">List User</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <form action="{{ route('admin_management_user_update', $mahasiswa->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="number" class="form-control" id="id" name="id_mahasiswa" min="1" required value="{{ $mahasiswa->id }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required value="{{ old('email', $mahasiswa->email) }}" readonly>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank if unchanged" readonly>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="is_verified" class="form-label">Verification Status</label>
                                <select name="is_verified" id="is_verified" class="form-control">
                                    <option value="pending" {{ $mahasiswa->is_verified == 'pending' ? 'selected' : '' }}>pending</option>
                                    <option value="verified" {{ $mahasiswa->is_verified == 'verified' ? 'selected' : '' }}>verified</option>
                                </select>
                                @error('is_verified')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <span class="mx-2"></span>
                                <a class="btn btn-secondary" href="{{ route('admin_management_user_index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
