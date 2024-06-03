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
        Schema::create('t_notification_touring', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('group_id'); 
            $table->integer('group_area_id');
            $table->string('event_config');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_notification_touring');
    }
};
