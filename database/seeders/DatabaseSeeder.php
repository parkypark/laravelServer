<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RestaurantSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(ThumbnailSeeder::class);
        $this->call(FoodSeeder::class);
        $this->call(PhoneListSeeder::class);
        $this->call(ActiveFoodSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}
