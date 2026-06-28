<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id('santri_id');
            $table->string('kode_santri', 20)->unique();
            $table->string('nama_santri', 100);
            $table->string('nama_panggilan', 50)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('no_telepon', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('nama_orang_tua', 100)->nullable();
            $table->string('no_telepon_orang_tua', 15)->nullable();
            $table->string('kelas', 50)->nullable(); // kelas santri
            $table->string('program', 100)->nullable(); // program pembelajaran
            $table->date('tanggal_masuk')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};