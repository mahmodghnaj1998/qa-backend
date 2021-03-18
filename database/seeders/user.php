<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsUser::create([
            "name"=>"sad",
            "email"=>"sad@sad.com",
            "password"=>Hash::make(123123123)
        ]);
        ModelsUser::create([
            "name"=>"sad",
            "email"=>"sad1@sad.com",
            "password"=>Hash::make(123123123)
        ]);
    }
}
