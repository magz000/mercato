<?php

use Illuminate\Database\Seeder;

class ProviderLocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provider_locations')->delete();
        
        \DB::table('provider_locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'provider_id' => '1',
                'location' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'provider_id' => '2',
                'location' => '9',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'provider_id' => '3',
                'location' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'provider_id' => '4',
                'location' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'provider_id' => '5',
                'location' => '5',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'provider_id' => '11',
                'location' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}