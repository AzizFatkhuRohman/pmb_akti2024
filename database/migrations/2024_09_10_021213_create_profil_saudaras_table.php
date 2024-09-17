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
        Schema::create('profil_saudara', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status_saudara1');
            $table->string('nama_saudara1');
            $table->string('pendidikan_terakhir1');
            $table->string('pekerjaan1');

            $table->string('status_saudara2')->nullable();
            $table->string('nama_saudara2')->nullable();
            $table->string('pendidikan_terakhir2')->nullable();
            $table->string('pekerjaan2')->nullable();

            $table->string('status_saudara3')->nullable();
            $table->string('nama_saudara3')->nullable();
            $table->string('pendidikan_terakhir3')->nullable();
            $table->string('pekerjaan3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_saudara');
    }
};
