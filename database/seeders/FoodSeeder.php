<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\hurryupApp\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Food::factory()->create([ 
            'restaurantID'  => '1',
            'name'  => 'Rice Cake Food',
            'description'  => 'Rice Cake',
            'ingredients'  => "A, B, C, D",
            'price'    => 8.00,
            'enabled'    => '1'
        ]); 
 
    }
}
