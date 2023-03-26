<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use DB;
use Str;
class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<10;$i++){  
        DB::table('blogs')->insert([
            //'id' => Str::random(10),
          
            'user_id' =>$faker->randomElement(['1','2','3']),
            'user_name'=>$faker->realtext(rand(20,30)),
            'blog_title' => $faker->title,
            'tags' => $faker->randomElement(['java','javascript','php','phython','laravel']),
            'blog_content' => $faker->paragraph,
            'category' =>$faker->randomElement(['Business','project Management','Technology','Digital Design']),
            'image'=>'blog-images/1677680482-blog.jpg',
            'comments'=>$faker->randomElement(['1','2','3']),
            'created_at'=>now(),
            'updated_at'=>now(),
          
        ]);
    }
    }
}
