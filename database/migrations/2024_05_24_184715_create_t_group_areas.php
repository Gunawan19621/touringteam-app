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
        Schema::create('t_group_areas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id');
            $table->enum('type', ['terlarang', 'checkpoint']);
            $table->string('name');
            $table->geometry('area');
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