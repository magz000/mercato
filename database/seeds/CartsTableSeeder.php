<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('carts')->delete();
        
        \DB::table('carts')->insert(array (
            0 => 
            array (
                'id' => 21,
                'user_id' => 9,
                'product_id' => 18,
                'quantity' => 1,
                'price' => 1143.0,
                'total' => 1143.0,
                'pickup_location' => '1',
                'pickup_date' => '2017-12-21',
                'pickup_time' => '9:00 AM',
                'created_at' => '2017-12-22 08:31:54',
                'updated_at' => '2017-12-22 08:31:54',
            ),
        ));
        
        
    }
}