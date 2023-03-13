<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'id' => '1',
                'cart_id' => '1',
                'role_id' => '1',
                'first_name' => 'Truong',
                'last_name' => 'Tran Van',
                'phone_number' => '123123124',
                'user_address' => 'An Khanh, Ninh Kieu, Can Tho',
                'email' => 'vantruong@gmail.com',
                'password' => Hash::make('123123123'),
                'link_avt' => '',
            ],
            [
                'id' => '2',
                'cart_id' => '2',
                'role_id' => '0',
                'first_name' => 'Truong 2',
                'last_name' => 'Tran Van',
                'phone_number' => '1412312',
                'user_address' => 'An Khanh, Ninh Kieu, Can Tho',
                'email' => 'vantruong2@gmail.com',
                'password' => Hash::make('456456456'),
                'link_avt' => '',
            ]
        );
        DB::table('users')->insert($data);
    }
}
