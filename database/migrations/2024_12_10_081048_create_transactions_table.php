<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\hurryupApp\ActiveFood;
use App\Models\hurryupApp\PhoneList;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id')->primary();
            $table->unsignedBigInteger('active_food_id')->foreignIdFor(ActiveFood::class); 
            $table->unsignedBigInteger('phone_number')->foreignIdFor(PhoneList::class); 
            $table->enum('status',['pending', 'completed', 'cancelled', 'failed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
