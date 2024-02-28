<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       User::create([
        'name' => 'intannuraeni',
        'email' => 'intannuraeni221108@gmail.com',
        'password' => Hash::make('rahasia'), //buat password selain pake Hash::make bisa juga pake bcrypt 
        'role' => 'administrator',
        'verifikasi' => 'sudah',
       ]); 
    }
}

