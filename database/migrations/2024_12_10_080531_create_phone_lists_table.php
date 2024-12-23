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
        Schema::create('phone_list', function (Blueprint $table) {
            $table->integer('group_id');
            $table->string('phone_number');
            $table->enum('Status',['pending', 'completed', 'cancelled', 'failed']);
            $table->string('encrypted_password');
            $table->timestamps();
            $table->primary(['group_id','phone_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_list');
    }
};
