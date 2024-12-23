<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\hurryupApp\ActiveFood;

class ActiveFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        ActiveFood::factory()->create([
            'food_ID'  => 1,
            'createddatetime'  => '2024-01-01 10:00:00',
            'expireddatetime'   => '2024-12-01 10:00:00',
            'curMember'  => '1',
            'maxMember'  => '10',
            'discount'    => '0.3',
            'status'    => 'pending'
        ]); 
    }
}
