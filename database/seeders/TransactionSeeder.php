<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\hurryupApp\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Transaction::factory()->create([ 
            'active_food_id'  => 1,
            'phone_number'  => '17783193408',
            'status'  => 'pending'
        ]);
        
    }
}
