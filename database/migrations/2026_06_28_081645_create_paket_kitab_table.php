<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_kitab', function (Blueprint $table) {
            $table->id('paket_id');
            $table->string('kode_paket', 20)->unique();
            $table->string('nama_paket', 100);
            $table->text('deskripsi')->nullable();
            $table->string('kelas', 50)->nullable(); // kelas santri
            $table->string('program', 100)->nullable(); // program pembelajaran
            $table->decimal('harga_paket', 12, 2)->default(0);
            $table->integer('diskon')->default(0);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_kitab');
    }
};