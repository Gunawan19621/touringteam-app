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
        Schema::create('t_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // for name of group
            $table->text('description')->nullable(); // for description of group
            $table->enum('send_notif', ['pic', 'all'])->default('all'); // pic is lead group and can be more then 2 pic = ketua group
            $table->integer('distance')->nullable(); // meter, for distance(jarak) terpisah rombongan dan ketika lebih dari jakar akan tersebar notif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_groups');
    }
};