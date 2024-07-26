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
            $table->string('no_seri')->nullable();
            $table->string('no_invent')->nullable();
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
