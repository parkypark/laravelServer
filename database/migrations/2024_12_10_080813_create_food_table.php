<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\hurryupApp\Restaurant;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('food', function (Blueprint $table) {
            $table->increments('Id')->primary();
            $table->unsignedBigInteger('RestaurantID')->foreignIdFor(Restaurant::class); 
            $table->string('Name');
            $table->text('Description')->nullable();
            $table->text('Ingredients')->nullable();
            $table->float('Price');
            $table->boolean('Enabled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
