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
            $table->integer('duration');
            $table->enum('duration_type', ['day', 'month', 'year']);
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
