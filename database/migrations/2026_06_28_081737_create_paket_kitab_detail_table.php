<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_kitab_detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('paket_id');
            $table->unsignedBigInteger('kitab_id');
            $table->integer('jumlah')->default(1);
            $table->timestamps();

            $table->foreign('paket_id')->references('paket_id')->on('paket_kitab')->onDelete('cascade');
            $table->foreign('kitab_id')->references('kitab_id')->on('kitab');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_kitab_detail');
    }
};