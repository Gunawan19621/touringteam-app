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
    { //  untuk penandaan area yang tidak boleh di datanginya / area yang harus di datanginya (bisa di bilang untuk rest area)
        Schema::create('t_group_areas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id');
            $table->enum('type', ['terlarang', 'checkpoint']);
            $table->string('name');
            $table->geometry('area');
            $table->integer('sort')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_group_areas');
    }
};