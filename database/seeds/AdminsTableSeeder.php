<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'john.doe@chefsandbutlers.net',
                'password' => '$2y$10$UgnCNdgPQab.EXX7uVxXHeNeNeJpfzDsyag2xWHlYxlMBLSmbxX/O',
                'firstname' => 'John',
                'middlename' => '',
                'lastname' => 'Doe',
                'privilege_id' => 1,
                'contact' => '09164794935',
                'status' => 1,
                'remember_token' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}