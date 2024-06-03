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
            $table->string('name');
            $table->decimal('est_price', 10, 2);
            $table->integer('duration');
            $table->integer('reminder'); // for reminder notif for example h-10
            $table->enum('status-reminder', ['active', 'inactive'])->default('inactive'); // for ignore or done
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
