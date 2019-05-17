<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_categories')->delete();
        
        \DB::table('product_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'image' => '1511430218.jpg',
                'name' => 'Dessert',
                'parent' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => '2017-11-23 17:43:38',
            ),
            1 => 
            array (
                'id' => 2,
                'image' => '1234567.jpg',
                'name' => 'Entree',
                'parent' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'image' => NULL,
                'name' => 'Cake',
                'parent' => 1,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'image' => '123.jpg',
                'name' => 'Soup',
                'parent' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'image' => NULL,
                'name' => 'Frozen',
                'parent' => 1,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'image' => NULL,
                'name' => 'Pastries',
                'parent' => 1,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'image' => NULL,
                'name' => 'Poultry',
                'parent' => 2,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'image' => NULL,
                'name' => 'Pork',
                'parent' => 2,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'image' => NULL,
                'name' => 'Beef',
                'parent' => 2,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'image' => NULL,
                'name' => 'Seafood',
                'parent' => 2,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'image' => NULL,
                'name' => 'Vegetarian',
                'parent' => 2,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'image' => NULL,
                'name' => 'Vegan',
                'parent' => 2,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'image' => NULL,
                'name' => 'Pasta',
                'parent' => 2,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'image' => '1234.jpg',
                'name' => 'Beverages',
                'parent' => NULL,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'image' => NULL,
                'name' => 'Coffee',
                'parent' => 14,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'image' => NULL,
                'name' => 'Refreshments',
                'parent' => 14,
                'status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}