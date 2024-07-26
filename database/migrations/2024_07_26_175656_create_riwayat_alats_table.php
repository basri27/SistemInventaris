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
        Schema::create('riwayat_alats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catatan_id')->constrained();
            $table->date('tgl_riwayat');
            $table->string('perawatan_berkala')->nullable();
            $table->string('kalibrasi')->nullable();
            $table->string('pelumasan')->nullable();
            $table->string('ganti_sparepart')->nullable();
            $table->string('overhaul')->nullable();
            $table->string('pic')->nullable();
            $table->string('ket_log')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_alats');
    }
};
