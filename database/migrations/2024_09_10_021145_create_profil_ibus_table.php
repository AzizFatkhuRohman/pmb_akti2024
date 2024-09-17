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
        Schema::create('profil_ibu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('no_ktp_ibu');
            $table->string('status_ibu');
            $table->string('nama_ibu');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pendidikan_terakhir');
            $table->string('pekerjaan');
            $table->integer('penghasilan_bulanan');
            $table->string('status_pernikahan');
            $table->string('alamat');
            $table->integer('no_rumah');
            $table->integer('rt');
            $table->integer('rw');
            $table->integer('kode_pos');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('desa');
            $table->bigInteger('no_telp');
            $table->string('email');
            $table->string('photo_ibu');
            $table->string('ktp_ibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_ibu');
    }
};
