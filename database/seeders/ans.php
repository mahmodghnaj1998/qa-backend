<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\answer;

class ans extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        answer::create([
            "answer"=>"ddd",
            "user_id"=>1,
            "qusetion_id"=>1
        ]);
        answer::create([
            "answer"=>"ddd",
            "user_id"=>1,
            "qusetion_id"=>2
        ]);
        answer::create([
            "answer"=>"ddd",
            "user_id"=>1,
            "qusetion_id"=>3
        ]);
        answer::create([
            "answer"=>"ddd",
            "user_id"=>1,
            "qusetion_id"=>4
        ]);
    }
}
