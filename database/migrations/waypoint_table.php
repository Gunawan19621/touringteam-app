<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * for table history tracking
     */
    public function up(): void
    {
        Schema::create('t_waypoints', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('group_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('altitude');
            $table->string('speed');
            $table->string('angle');
            $table->timestamp('created_at_wptime')->nullable();
            $table->timestamp('updated_at_wptime')->nullable();
            $table->timestamp('created_at_date_send')->nullable();
            $table->timestamp('updated_at_date_send')->nullable();
            $table->timestamps();  // This will add standard created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_waypoints');
    }
};
