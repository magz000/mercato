<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('locations')->delete();
        
        \DB::table('locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Cravings - Katipunan',
                'color' => '#00ff00',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => '2017-11-24 13:17:46',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'TCB - Katipunan',
                'color' => '#831700',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'CCA - Katipunan',
                'color' => '#669900',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'BNP - Ortigas',
                'color' => '#9933ff',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Where\'s Marcel - Ortigas',
                'color' => '#0066ff',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Casa Roces - Manila',
                'color' => '#666633',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'C3 - Greenhills',
                'color' => '#990099',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Epicurious - Shangrila',
                'color' => '#009999',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'C2 - Shangrila',
                'color' => '#000099',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'The Orange Place - Kamias',
                'color' => '#660066',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}