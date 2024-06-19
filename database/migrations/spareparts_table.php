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
            $table->string('name'); // for name of sparepart (ganti oli, ganti ban, dll)
            $table->decimal('est_price', 10, 2)->nullable(); // perkiraan harga sparepart
            $table->integer('duration')->nullable(); // untuk durasi penggantian sparepart
            $table->enum('duration_type', ['day', 'month', 'year'])->nullable();
            $table->integer('reminder'); //untuk mengingatkan 10 hari / lebih sebelumnya
            $table->enum('status_reminder', ['ignore', 'done'])->default('ignore'); // for ignore or done untuk pengingat ketika sudah di pilih done = iya atau sudah
            // $table->timestamp('reminder')->nullable();
            $table->timestamp('last_service')->nullable(); // for last replace or service
            $table->text('description')->nullable();
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