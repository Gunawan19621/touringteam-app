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
        Schema::create('t_add_point_history', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('point');
            $table->string('type'); // for add active or referal code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_add_point_history');
    }
};
