<?php

use Illuminate\Database\Seeder;

class LocationLimitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('location_limits')->delete();
        
        \DB::table('location_limits')->insert(array (
            0 => 
            array (
                'id' => 0,
                'user_id' => 12,
                'location_id' => 1,
                'created_at' => '2018-03-06 16:29:25',
                'updated_at' => '2018-03-06 16:29:25',
            ),
            1 => 
            array (
                'id' => 0,
                'user_id' => 12,
                'location_id' => 10,
                'created_at' => '2018-03-06 16:29:30',
                'updated_at' => '2018-03-06 16:29:30',
            ),
            2 => 
            array (
                'id' => 0,
                'user_id' => 11,
                'location_id' => 10,
                'created_at' => '2018-03-07 09:37:39',
                'updated_at' => '2018-03-07 09:37:39',
            ),
            3 => 
            array (
                'id' => 0,
                'user_id' => 12,
                'location_id' => 1,
                'created_at' => '2018-03-06 16:29:25',
                'updated_at' => '2018-03-06 16:29:25',
            ),
            4 => 
            array (
                'id' => 0,
                'user_id' => 12,
                'location_id' => 10,
                'created_at' => '2018-03-06 16:29:30',
                'updated_at' => '2018-03-06 16:29:30',
            ),
            5 => 
            array (
                'id' => 0,
                'user_id' => 11,
                'location_id' => 10,
                'created_at' => '2018-03-07 09:37:39',
                'updated_at' => '2018-03-07 09:37:39',
            ),
            6 => 
            array (
                'id' => 0,
                'user_id' => 12,
                'location_id' => 1,
                'created_at' => '2018-03-06 16:29:25',
                'updated_at' => '2018-03-06 16:29:25',
            ),
            7 => 
            array (
                'id' => 0,
                'user_id' => 12,
                'location_id' => 10,
                'created_at' => '2018-03-06 16:29:30',
                'updated_at' => '2018-03-06 16:29:30',
            ),
            8 => 
            array (
                'id' => 0,
                'user_id' => 11,
                'location_id' => 10,
                'created_at' => '2018-03-07 09:37:39',
                'updated_at' => '2018-03-07 09:37:39',
            ),
        ));
        
        
    }
}