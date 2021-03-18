<?php

namespace Database\Seeders;

use App\Models\like as ModelsLike;
use Illuminate\Database\Seeder;

class like extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsLike::create([
            "user_id"=>1,
            "answer_id"=>1,
            "qusetion_id"=>1
        ]);
        ModelsLike::create([
            "user_id"=>2,
            "answer_id"=>2,
            "qusetion_id"=>1
        ]);
        ModelsLike::create([
            "user_id"=>1,
            "answer_id"=>3,
            "qusetion_id"=>1
        ]);
        ModelsLike::create([
            "user_id"=>2,
            "answer_id"=>4,
            "qusetion_id"=>1

        ]);
        ModelsLike::create([
            "user_id"=>1,
            "answer_id"=>5,
            "qusetion_id"=>1
        ]);
    }
}
