<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\qusetion;
class qa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        qusetion::create([
            "qusetion"=>"dddddd",
            "slug"=>"ddddd",
            "conect"=>"hhhhhhh",
            "user_id"=>1,
            'language_id'=>1
        ]);
        qusetion::create([
            "qusetion"=>"dddddd",
            "slug"=>"fdfd",
            "conect"=>"hhhhhhh",
            "user_id"=>2,
            'language_id'=>2
        ]);
        qusetion::create([
            "qusetion"=>"dddddd",
            "slug"=>"fdfdknkl",
            "conect"=>"hhhhhhh",
            "user_id"=>1,
            "language_id"=>3
        ]);
        qusetion::create([
            "qusetion"=>"dddddd",
            "slug"=>"fdfvdfva",
            "conect"=>"hhhhhhh",
            "user_id"=>2,
            "language_id"=>4
        ]);
        qusetion::create([
            "qusetion"=>"dddddd",
            "slug"=>"dvfdbgd",
            "conect"=>"hhhhhhh",
            "user_id"=>1,
            "language_id"=>5
        ]);
        qusetion::create([
            "qusetion"=>"php",
            "slug"=>"sdckdksk",
            "conect"=>"hhhhhhh",
            "user_id"=>1,
            'language_id'=>1
        ]);
        qusetion::create([
            "qusetion"=>"php",
            "slug"=>"ksksksk",
            "conect"=>"hhhhhhh",
            "user_id"=>1,
            'language_id'=>1
        ]);
        qusetion::create([
            "qusetion"=>"php",
            "slug"=>"fvfdvfgvbffff",
            "conect"=>"hhhhhhh",
            "user_id"=>1,
            'language_id'=>1
        ]);
        qusetion::create([
            "qusetion"=>"php",
            "slug"=>"php",
            "conect"=>"kkkksksdsk",
            "user_id"=>1,
            'language_id'=>1
        ]);
    }
}
