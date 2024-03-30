<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'address'=>'Damascus',
            'password'=>Hash::make('123123123'),
            'is_admin'=>true,
        ]);
        User::create([
            'name'=>'Ayham',
            'email'=>'ayham@gmail.com',
            'address'=>'Damascus',
            'password'=>Hash::make('123123123'),
            'is_admin'=>false,
        ]);
    }
}
