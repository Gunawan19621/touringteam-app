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
        Schema::create('m_spareparts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('estprice', 10, 2);
            $table->integer('durasi');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('reminder')->nullable();
            $table->timestamp('last')->nullable();
            $table->text('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_spareparts');
    }
};
