<?php

use Illuminate\Database\Seeder;

class PageViewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_views')->delete();
        
        \DB::table('page_views')->insert(array (
            0 => 
            array (
                'id' => 8,
                'ip' => '127.0.0.1',
                'location' => 'localhost',
                'device' => 'desktop',
                'created_at' => '2017-11-07 05:54:49',
                'updated_at' => '2017-11-07 05:54:49',
            ),
            1 => 
            array (
                'id' => 9,
                'ip' => '127.0.0.1',
                'location' => 'localhost',
                'device' => 'desktop',
                'created_at' => '2017-11-08 02:17:53',
                'updated_at' => '2017-11-08 02:17:53',
            ),
            2 => 
            array (
                'id' => 10,
                'ip' => '127.0.0.1',
                'location' => 'localhost',
                'device' => 'desktop',
                'created_at' => '2017-11-09 02:03:47',
                'updated_at' => '2017-11-09 02:03:47',
            ),
            3 => 
            array (
                'id' => 11,
                'ip' => '127.0.0.1',
                'location' => 'localhost',
                'device' => 'desktop',
                'created_at' => '2017-11-09 02:03:47',
                'updated_at' => '2017-11-09 02:03:47',
            ),
            4 => 
            array (
                'id' => 12,
                'ip' => 'UNKNOWN',
                'location' => 'localhost',
                'device' => 'desktop',
                'created_at' => '2017-11-09 09:06:19',
                'updated_at' => '2017-11-09 09:06:19',
            ),
            5 => 
            array (
                'id' => 13,
                'ip' => '127.0.0.1',
                'location' => 'localhost',
                'device' => 'desktop',
                'created_at' => '2017-11-11 04:51:09',
                'updated_at' => '2017-11-11 04:51:09',
            ),
        ));
        
        
    }
}