<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use Illuminate\Support\Str;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Admin',
            'number'=>'01760357696',
            'password' =>Hash::make('password'),
            'type'=>'admin'
        ]);
    }
}
