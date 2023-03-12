<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'cart_id' => '1',
                'id' => '1',
            ],
            [
                'cart_id' => '2',
                'id' => '2',
            ]
        );
        DB::table('cart')->insert($data);
    }
}
