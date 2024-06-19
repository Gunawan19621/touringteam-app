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
        Schema::create('m_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('expired');
            $table->integer('duration')->nullable();
            $table->enum('duration_type', ['day', 'month', 'year'])->nullable();
            $table->string('description')->nullable();
            $table->integer('reminder')->nullable(); //untuk mengingatkan 10 hari / lebih sebelumnya
            $table->enum('status_reminder', ['ignore', 'done'])->default('ignore'); // for ignore or done untuk pengingat ketika sudah di pilih done = iya atau sudah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_documents');
    }
};