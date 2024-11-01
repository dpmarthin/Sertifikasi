<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminPendaftaranController;

//default
Route::get('/', function () {
    return view('register');
})->name('viewRegister');

//register
Route::get('/register', [RegisterController::class, 'register'])->name('viewRegister');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginsubmit', [LoginController::class, 'loginvalid'])->name('loginsubmit');
Route::post('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Admin Dashboard (PKD-50)
Route::get('/dashboard-admin', [AdminDashboardController::class, 'index'])->name('dashboard_admin');

//List User
Route::get('/admin/management_user', [ManagementUserController::class, 'index'])->name('admin_management_user_index');
Route::get('/admin/management_user/edit/{id}', [ManagementUserController::class, 'edit'])->name('admin_management_user_edit');
Route::put('/admin/management_user/{id}', [ManagementUserController::class, 'update'])->name('admin_management_user_update');
Route::delete('/admin/management_user/{id}', [ManagementUserController::class, 'destroy'])->name('admin_management_user_delete');

//Pendaftaran Mahasiswa 
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran_index');
Route::get('/pendaftaran/add', [PendaftaranController::class, 'add'])->name('pendaftaran_add');
Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftaran_store');

//Pendaftaran Approved Mahasiswa
Route::get('/pendaftaran/approved', [PendaftaranController::class, 'approvedIndex'])->name('pendaftaran_approved');
Route::get('/pendaftaran/approved/{id}', [PendaftaranController::class, 'detailApproved'])->name('detail_approved');
Route::get('/pendaftaran/{id}/generate-pdf', [PendaftaranController::class, 'generatePdf'])->name('pendaftaran_generate_pdf');

//Pendaftaran Admin
Route::get('/admin/pendaftaran', [AdminPendaftaranController::class, 'index'])->name('admin_pendaftaran_index');
Route::get('/admin/pendaftaran/edit/{id}', [AdminPendaftaranController::class, 'edit'])->name('admin_pendaftaran_edit');
Route::put('/admin/pendaftaran/{id}', [AdminPendaftaranController::class, 'update'])->name('admin_pendaftaran_update');
Route::delete('/admin/pendaftaran/{id}', [AdminPendaftaranController::class, 'destroy'])->name('admin_pendaftaran_delete');

//Pendaftaran Approved Admin
Route::get('/admin/pendaftaran/approved', [AdminPendaftaranController::class, 'approvedIndex'])->name('admin_pendaftaran_approved');
Route::get('/admin/pendaftaran/approved/{id}', [AdminPendaftaranController::class, 'detailApproved'])->name('admin_detail_approved');
Route::get('/admin/pendaftaran/approved/{id}/generate', [AdminPendaftaranController::class, 'generateApprovedPdf'])->name('admin_pendaftaran_generate_pdf');
