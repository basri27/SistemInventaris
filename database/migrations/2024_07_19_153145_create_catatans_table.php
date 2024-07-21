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
        Schema::create('catatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invent_id')->constrained();
            $table->string('no_formulir')->nullable();
            $table->string('edisi')->nullable();
            $table->string('revisi')->nullable();
            $table->string('no_resi')->nullable();
            $table->string('no_invent')->nullable();
            $table->date('log_date');
            $table->boolean('perawatan_berkala')->nullable();
            $table->boolean('kalibrasi')->nullable();
            $table->boolean('pelumasan')->nullable();
            $table->boolean('ganti_sparepart')->nullable();
            $table->boolean('overhaul')->nullable();
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
        Schema::dropIfExists('catatans');
    }
};
