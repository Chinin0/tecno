<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Cristhian Arauz Ramirez',
            'email'=>'cristhianarauz06@gmail.com',
            'password'=>bcrypt('00000000'),
            'telefono'=>'+591 79914901',
        ])->assignRole('Admin');

        User::factory(4)->create();
    }
}
