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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_sd')->nullable();
            $table->string('kota_sd')->nullable();
            $table->integer('tahun_sd')->nullable();
            $table->integer('lulus_sd')->nullable();
            $table->string('nama_smp')->nullable();
            $table->string('kota_smp')->nullable();
            $table->integer('tahun_smp')->nullable();
            $table->integer('lulus_smp')->nullable();
            $table->string('nama_smk')->nullable();
            $table->string('kota_smk')->nullable();
            $table->integer('tahun_smk')->nullable();
            $table->integer('lulus_smk')->nullable();
            $table->string('jurusan');
            $table->string('tingkat_prestasi_akademik')->nullable();
            $table->string('nama_prestasi_akademik')->nullable();
            $table->string('penyelenggara_prestasi_akademik')->nullable();
            $table->string('sertifikat_prestasi_akademik')->nullable();
            $table->string('tingkat_prestasi_non_akademik')->nullable();
            $table->string('nama_prestasi_non_akademik')->nullable();
            $table->string('penyelenggara_prestasi_non_akademik')->nullable();
            $table->string('sertifikat_prestasi_non_akademik')->nullable();
            $table->string('sekolah_dibiayai_oleh')->nullable();
            $table->string('smt_1_matematika')->nullable();
            $table->string('smt_1_indonesia')->nullable();
            $table->string('smt_1_inggris')->nullable();
            $table->string('smt_1_raport')->nullable();
            $table->string('smt_2_matematika')->nullable();
            $table->string('smt_2_indonesia')->nullable();
            $table->string('smt_2_inggris')->nullable();
            $table->string('smt_2_raport')->nullable();
            $table->string('smt_3_matematika')->nullable();
            $table->string('smt_3_indonesia')->nullable();
            $table->string('smt_3_inggris')->nullable();
            $table->string('smt_3_raport')->nullable();
            $table->string('smt_4_matematika')->nullable();
            $table->string('smt_4_indonesia')->nullable();
            $table->string('smt_4_inggris')->nullable();
            $table->string('smt_4_raport')->nullable();
            $table->string('smt_5_matematika')->nullable();
            $table->string('smt_5_indonesia')->nullable();
            $table->string('smt_5_inggris')->nullable();
            $table->string('smt_5_raport')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
