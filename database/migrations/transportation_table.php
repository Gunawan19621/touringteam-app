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
        Schema::create('m_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('nama');
            $table->string('mesin');
            $table->integer('thnbeli');
            $table->integer('thnrakit');
            $table->text('desc')->nullable();
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
