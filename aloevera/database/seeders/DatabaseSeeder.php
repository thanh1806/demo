<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' =>'admin@admin.com',
            'password' => Hash::make('0327949585'),
            'pwd' => '0327949585',
            
        ]);
    }
}
