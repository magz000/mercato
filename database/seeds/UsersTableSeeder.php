<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'picture' => '1511753018.jpg',
                'firstname' => 'John',
                'middlename' => NULL,
                'lastname' => 'Doe',
                'email' => 'carlo.flores@chefsandbutlers.net',
                'password' => '$2y$10$kJql5lpJCGlO1netOU7uu.gyn/Ly5Hdf2mcMKEQ4qWcklvB9/8VOG',
                'contact' => '09164794935',
                'street' => 'Road 5 M De Leon',
                'barangay' => 'Santolan',
                'city' => 'Pasig City',
                'state' => 'Metro Manila',
                'postal_code' => '1610',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => '32ytrPBERpaFfvSSujn2lVVqn2RBDbuDqoM8T6ySc7W85o1xVc2GqNc24rP2',
                'created_at' => NULL,
                'updated_at' => '2017-11-27 11:23:38',
            ),
            1 => 
            array (
                'id' => 2,
                'picture' => '',
                'firstname' => 'alskflhasflkh',
                'middlename' => NULL,
                'lastname' => 'lkhkllkh',
                'email' => 'asfasfasfasf@asfasfasf.com',
                'password' => '$2y$10$eg3R2fOXFYeb0PvqyXBP3eaAvYWjfqbeoQZe2k9jFL3FRuk/boZYi',
                'contact' => '098901823',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-11-20 10:58:55',
                'updated_at' => '2017-11-20 10:58:55',
            ),
            2 => 
            array (
                'id' => 3,
                'picture' => '',
                'firstname' => 'asf',
                'middlename' => NULL,
                'lastname' => 'asfasfasf',
                'email' => 'asfasf@asasdasd.com',
                'password' => '$2y$10$iqi2BnDN6U783C/nYm4V..SKTLyNDIImYmwnlRJgKcVNZy46mCan2',
                'contact' => '123123',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-11-20 12:52:46',
                'updated_at' => '2017-11-20 12:52:46',
            ),
            3 => 
            array (
                'id' => 4,
                'picture' => '',
                'firstname' => 'Carlo',
                'middlename' => NULL,
                'lastname' => 'Flores',
                'email' => 'test@test.com',
                'password' => '$2y$10$dgtLfKgNuAogSahdHuPvAOkCtNhDMK1qEgnhysP1Xa8lZJJzxwK/S',
                'contact' => '123123123',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => 0,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-11-20 12:54:52',
                'updated_at' => '2018-03-07 02:20:07',
            ),
            4 => 
            array (
                'id' => 5,
                'picture' => '',
                'firstname' => 'Angelo',
                'middlename' => NULL,
                'lastname' => 'Jugueta',
                'email' => 'ajugueta.cravingsgroup@gmail.com',
                'password' => '$2y$10$l2WJrddKfSsFVawyr7bWVOkV60xcCai9noYgQN2BYyroVuOI8yhwC',
                'contact' => '09178112294',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => 'xEEkpqyYzubCkYvkdm7id2XjcTSAHlPxAx2qZL8Ps4qAwkUqA9TyxmMnf5pS',
                'created_at' => '2017-12-12 00:46:51',
                'updated_at' => '2017-12-12 00:46:51',
            ),
            5 => 
            array (
                'id' => 6,
                'picture' => '',
                'firstname' => 'Marc',
                'middlename' => NULL,
                'lastname' => 'Amaro',
                'email' => 'marcial.amaro6@gmail.com',
                'password' => '$2y$10$0BSzOvYkGy26qTqbgjiX1uiQX2675nDXkQbhmhQGByYtgxmSuA3YW',
                'contact' => '09175851290',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => 'sm1IoFYBWnEDIUPwH3HIVDfC5rdX54xd6cPOJwWK2otFSUVuUOpj0btyfjtn',
                'created_at' => '2017-12-12 02:07:17',
                'updated_at' => '2017-12-12 02:07:17',
            ),
            6 => 
            array (
                'id' => 7,
                'picture' => '',
                'firstname' => 'Angelo',
                'middlename' => NULL,
                'lastname' => 'Jugueta',
                'email' => 'angelojugueta@gmail.com',
                'password' => '$2y$10$ipyiTI8tGKktuiMThbmh7e1Qj2WTCordxt78EIjFD0BKP6oF2L.Xu',
                'contact' => '09178112294',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-12-22 07:40:02',
                'updated_at' => '2017-12-22 07:40:02',
            ),
            7 => 
            array (
                'id' => 8,
                'picture' => '',
                'firstname' => 'Rico',
                'middlename' => NULL,
                'lastname' => 'Trinidad',
                'email' => 'ricotrinidad@yahoo.com',
                'password' => '$2y$10$w8WyDryQ6u0bpuhnaAgpmu672lZ5/gV7Ax1lehnGYnI3KpZ.h6hiK',
                'contact' => '09188273752',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-12-22 07:43:10',
                'updated_at' => '2017-12-22 07:43:10',
            ),
            8 => 
            array (
                'id' => 9,
                'picture' => '',
                'firstname' => 'John',
                'middlename' => NULL,
                'lastname' => 'Doe',
                'email' => 'asdasd@asdasd.com',
                'password' => '$2y$10$u/LRGI84CLf2YZ0bvRcFiekf.CS2QyYbKKOik5PvAHEkQDnnObKj2',
                'contact' => '123456788',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-12-22 08:00:39',
                'updated_at' => '2017-12-22 08:00:39',
            ),
            9 => 
            array (
                'id' => 10,
                'picture' => '',
                'firstname' => 'liza',
                'middlename' => NULL,
                'lastname' => 'gil',
                'email' => 'malizagil@yahoo.com',
                'password' => '$2y$10$k1irZ7JdDx7UqQURLffjLuASgFxghj5ZX1uWOdHBSjqUmxylPEfyK',
                'contact' => '09163773664',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2017-12-23 04:23:16',
                'updated_at' => '2017-12-23 04:23:16',
            ),
            10 => 
            array (
                'id' => 11,
                'picture' => '',
                'firstname' => 'Sherwin',
                'middlename' => NULL,
                'lastname' => 'Lorico',
                'email' => 'test2@gmail.com',
                'password' => '$2y$10$8co9iQVx0LsiNti3B0.97ugBlIgbgliJqE0IV5IY9.mHVEpFgxZYu',
                'contact' => '123123',
                'street' => '',
                'barangay' => '',
                'city' => '',
                'state' => '',
                'postal_code' => '',
                'is_establishment' => 1,
                'status' => 1,
                'remember_token' => NULL,
                'created_at' => '2018-03-07 02:26:29',
                'updated_at' => '2018-03-07 09:37:31',
            ),
            11 => 
            array (
                'id' => 12,
                'picture' => '1520328297.jpg',
                'firstname' => 'Metrobank',
                'middlename' => NULL,
                'lastname' => 'Kamias',
                'email' => 'test3@gmail.com',
                'password' => '$2y$10$JnWmRNyz.h/BaGnZg..9X.V96CBmoGKFyoCvWzni5391vqROavLl2',
                'contact' => '123456789',
                'street' => 'K-H St, Kamias Rd',
                'barangay' => 'Diliman',
                'city' => 'Quezon City',
                'state' => 'Metro Manila',
                'postal_code' => '1101',
                'is_establishment' => 1,
                'status' => 1,
                'remember_token' => 'i3CvV3uDlPDza4tuHsanpE4iS0lKqDCEAdb5fLYXOvuWRInWPCRQHT2hq2xf',
                'created_at' => '2018-03-06 16:25:50',
                'updated_at' => '2018-03-07 09:30:54',
            ),
            12 => 
            array (
                'id' => 13,
                'picture' => '1520328573.jpg',
                'firstname' => 'Jose',
                'middlename' => NULL,
                'lastname' => 'Rizal',
                'email' => 'test4@gmail.com',
                'password' => '$2y$10$a4ttsBAVNxhsgGITtVmLoOF/gMqSMCfzOub0MdvKqls7HGC1E/6Ie',
                'contact' => '09123456789',
                'street' => 'asda',
                'barangay' => 'asd',
                'city' => 'asda',
                'state' => 'asda',
                'postal_code' => '123',
                'is_establishment' => NULL,
                'status' => 1,
                'remember_token' => 'GFMuryTF1looqDrIaILRLPCxtyTEIFSFsJ4f5GI30KB4Pv8zL27oX2iBgmZD',
                'created_at' => '2018-03-06 17:27:40',
                'updated_at' => '2018-03-06 17:29:33',
            ),
        ));
        
        
    }
}