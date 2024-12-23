<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\hurryupApp\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  
        Address::factory()->create([ 
            'Address1'  => '5240 Rumble St',
            'Address2'  => '',
            'City'  => 'Burnaby',
            'Province'  => 'BC',
            'Postal'    => 'V5J 2B6',
            'Country'    => 'Canada'
        ]);
        
        Address::factory()->create([ 
            'Address1'  => '5240 Rumble St',
            'Address2'  => '',
            'City'  => 'Burnaby',
            'Province'  => 'BC',
            'Postal'    => 'V5J 2B6',
            'Country'    => 'Canada'
        ]);

        Address::factory()->create([ 
            'Address1'  => '5240 Rumble St',
            'Address2'  => '',
            'City'  => 'Burnaby',
            'Province'  => 'BC',
            'Postal'    => 'V5J 2B6',
            'Country'    => 'Canada'
        ]);
    }
}
