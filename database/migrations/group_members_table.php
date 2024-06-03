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
        Schema::create('t_group_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('group_id');
            $table->bigInteger('user_id');
            $table->enum('status_approve', ['waiting','approve', 'reject'])->default('waiting');
            $table->enum('status', ['active', 'inactive', 'none'])->default('none'); // for status following touring
            $table->enum('status_sos', ['active', 'inactive']);
            $table->enum('status_lead', ['true', 'false'])->default('false');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_group_members');
    }
};
