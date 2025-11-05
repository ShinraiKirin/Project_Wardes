<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_name' => 'Admin',
                'description' => 'Administrator with full access',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role_name' => 'Kasir',
                'description' => 'Kasir yang mengelola transaksi penjualan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role_name' => 'Manager',
                'description' => 'Supervisor untuk laporan dan kontrol menu',
                'created_at' => now(),
                'updated_at' => now()
                
            ]
        ]);
    }
}
