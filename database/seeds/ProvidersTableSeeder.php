<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('providers')->delete();
        
        \DB::table('providers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'picture' => '5790383.jpg',
                'username' => 'cravings',
                'firstname' => 'Chef',
                'middlename' => '',
                'lastname' => 'Cravings',
                'email' => 'carlo.flores@chefsandbutlers.net',
                'password' => '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG',
                'bio' => '',
                'contact' => '09164794935',
                'street' => '134 Road 5 M De Leon',
                'barangay' => 'Santolan',
                'city' => 'Pasig City',
                'state' => 'Metro Manila',
                'postal_code' => '1610',
                'status' => 1,
                'remember_token' => 'dPiwsEu7TQifSmH1S2EXn9397pG4PhtHfKOu0GCvQeOwQUz499VFEhgqOyww',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'picture' => '5342212.jpg',
                'username' => 'c2',
                'firstname' => 'Chef',
                'middlename' => NULL,
                'lastname' => 'C2',
                'email' => 'marcial.amaro@chefsandbutlers.net',
                'password' => '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG',
                'bio' => '',
                'contact' => '09164794935',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'status' => 1,
                'remember_token' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'picture' => '5342212.jpg',
                'username' => 'bnp',
                'firstname' => 'Chef',
                'middlename' => NULL,
                'lastname' => 'BNP',
                'email' => 'bnp@vmercatop.com',
                'password' => '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG',
                'bio' => '',
                'contact' => '09164794935',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'status' => 1,
                'remember_token' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'picture' => '5342212.jpg',
                'username' => 'tcb',
                'firstname' => 'Chef',
                'middlename' => NULL,
                'lastname' => 'TCB',
                'email' => 'tcb@vmercatop.com',
                'password' => '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG',
                'bio' => '',
                'contact' => '09178112294',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'status' => 1,
                'remember_token' => 'ERE6UI1RBUhlNgd66z8QWNPIRkvmJGlDUWnXVIvSV3ENKrQRcASkJ8yo53cH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'picture' => '5342212.jpg',
                'username' => 'wheresmarcel',
                'firstname' => 'Chef',
                'middlename' => NULL,
                'lastname' => 'Marcel',
                'email' => 'wheresmarcel@vmercatop.com',
                'password' => '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG',
                'bio' => '',
                'contact' => '09164794935',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'status' => 1,
                'remember_token' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 11,
                'picture' => '5342212.jpg',
                'username' => 'top',
                'firstname' => 'Chef',
                'middlename' => NULL,
                'lastname' => 'Orange',
                'email' => 'top@vmercatop.com',
                'password' => '$2y$10$/exWZtm7eBW.h1lWLr3x1OJPqmvec5zgNs1CnQ8Skuq7teJUcuNlG',
                'bio' => '',
                'contact' => '09164794935',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'status' => 1,
                'remember_token' => '',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 12,
                'picture' => '',
                'username' => 'MarcialAmaro',
                'firstname' => 'Marcial',
                'middlename' => NULL,
                'lastname' => 'Amaro',
                'email' => 'marcial.amaro@cravings.com',
                'password' => '$2y$10$rEN6OCw4uBI9/o1kYbcy9OjhCwHCInkPOHDFU3po6e3vRr/oTQ.iO',
                'bio' => '',
                'contact' => '09175851290',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-12-07 07:31:33',
                'updated_at' => '2017-12-07 07:31:33',
            ),
        ));
        
        
    }
}