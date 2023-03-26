<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use DB;
use Str;
use Illuminate\Database\Eloquent\Factories\Factory;
class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<10;$i++) {
        DB::table('questions')->insert([
            //'id' => Str::random(10),
            
            'user_id' =>$faker->randomElement(['1','2','3']),
            'question' => $faker->realtext(rand(50,100)),
            'tags' => $faker->randomElement(['java','javascript','php','phython','laravel']),
            'discription' => $faker->paragraph,
            'category' =>$faker->randomElement(['language','Analytics','Communication','Management','Company','University','Programmers','programs']),
            'permit' =>$faker->randomElement(['Y','N']) ,
            'created_at'=>now(),
            'updated_at'=>now(),
            
        ]);
    }
    }
}
