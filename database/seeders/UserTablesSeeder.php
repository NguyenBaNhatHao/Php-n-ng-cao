<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'sincollmm',
            'email' => 'sincollmm2001@gmail.com',
            'password' => Hash::make('zxcZXCV123'),
            'remember_token' => Str::random(10)
        ]);
    }
}
