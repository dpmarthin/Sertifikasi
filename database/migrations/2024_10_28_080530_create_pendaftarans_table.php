<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->string('nama_lengkap');
            $table->longText('alamat_KTP');
            $table->longText('alamat_lengkap');
            $table->unsignedBigInteger('provinsi');
            $table->unsignedBigInteger('kota_kabupaten');
            $table->unsignedBigInteger('kecamatan');
            $table->bigInteger('nomor_telepon');
            $table->bigInteger('nomor_hp');
            $table->string('email');
            $table->string('kewarganegaraan');
            $table->string('negara_lahir')->nullable();
            $table->dateTime('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('jenis_kelamin');
            $table->string('status_menikah');
            $table->string('agama');
            $table->string('foto_mahasiswa');
            $table->string('status');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');      
            // Definisikan foreign key untuk provinsi, kota_kabupaten, dan kecamatan jika diperlukan
            $table->foreign('provinsi')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('kota_kabupaten')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('kecamatan')->references('id')->on('districts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
