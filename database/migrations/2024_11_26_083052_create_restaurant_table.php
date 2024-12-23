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
        Schema::create('restaurant', function (Blueprint $table) {
            $table->increments('id')->primary(); // Primary Key
            $table->string('name'); // Name column
            $table->text('description')->nullable(); // Description column
            $table->unsignedBigInteger('address_id'); // Foreign Key to Address table
            $table->unsignedBigInteger('image_id')->nullable(); // Foreign Key to Image table
            $table->timestamps(); // Created_at and Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant');
    }
};
