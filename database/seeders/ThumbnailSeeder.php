<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\hurryupApp\Thumbnail;

class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        Thumbnail::factory()->create([
            'imgUrl' => 'RestA.png'
        ]);
        Thumbnail::factory()->create([
            'imgUrl' => 'RestB.png'
        ]);
        Thumbnail::factory()->create([
            'imgUrl' => 'RestC.png'
        ]);
    }
}
