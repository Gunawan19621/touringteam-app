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
        Schema::create('t_notification_reminder', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ref_reminder_id'); // sparepart or document
            $table->enum('type', ['sparepart', 'dokument']);
            $table->enum('status', ['open', 'close'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_notification_reminder');
    }
};
