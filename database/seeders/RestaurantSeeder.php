<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use Illuminate\Support\Facades\DB;
use App\Models\hurryupApp\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    use WithoutModelEvents;

    public function run(): void
    {
        //
        Restaurant::factory()->create([
            'name' => 'Rest A',
            'description' => 'This is Restaurant A info',
            'address_id' => 1,
            'image_id' => 1,
        ]);
        Restaurant::factory()->create([
            'name' => 'Rest B',
            'description' => 'This is Restaurant B info',
            'address_id' => 2,
            'image_id' => 2
        ]);
        Restaurant::factory()->create([
            'name' => 'Rest C',
            'description' => 'This is Restaurant C info',
            'address_id' => 3,
            'image_id' => 3
        ]); 
         
    }
}
