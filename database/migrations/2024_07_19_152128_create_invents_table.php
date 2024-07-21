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
        Schema::create('invents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();
            $table->string('kode');
            $table->string('uraian');
            $table->integer('jumlah');
            $table->string('merk')->nullable();
            $table->string('model')->nullable();
            $table->string('supplier')->nullable();
            $table->string('no_po')->nullable();
            $table->date('tgl_perolehan')->nullable();
            $table->integer('harga')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('perolehan')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('ket_invent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invents');
    }
};
