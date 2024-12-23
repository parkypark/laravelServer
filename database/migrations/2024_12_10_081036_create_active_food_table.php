<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\hurryupApp\Food;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('active_food', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedBigInteger('food_ID')->foreignIdFor(Food::class); 
            $table->integer('curMember');
            $table->integer('maxMember');
            $table->float('discount')->nullable();
            $table->timestamp('createddatetime')->nullable();
            $table->timestamp('expireddatetime')->nullable();
            $table->enum('status',['pending', 'completed', 'cancelled', 'failed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('active_food');
    }
};
