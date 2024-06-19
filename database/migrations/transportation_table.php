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
        Schema::create('m_transportations', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // untuk tipe motor, mobil, speda, dll
            $table->string('name');  // untuk nama kendaraan controh supra 110
            $table->string('machine')->nullable(); // untuk untuk kendaraan honda, yamaha, dll
            $table->integer('thn_beli')->nullable();
            $table->integer('thn_rakit')->nullable();
            $table->string('plat_no')->nullable();
            $table->string('foto_kendaraan')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_vehicles');
    }
};