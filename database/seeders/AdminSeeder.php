<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
{
    // Cek apakah admin dengan username 'admin' sudah ada
    $existing = DB::table('intan_admins')->where('username', 'admin')->first();

    if (!$existing) {
        DB::table('intan_admins')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin123'), // password terenkripsi
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

}
