<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'Mukti2Qty',
            'password' => Hash::make('AdminQtyMukti2'), // Pastikan menggunakan Hash untuk password
        ]);
    }
}
