<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'role_id' => '1',
                'role_name' => 'admin'
            ],
            [
                'role_id' => '0',
                'role_name' => 'customer'
            ]
        );
        DB::table('role')->insert($data);
    }
}
