<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Удалим имеющиеся в таблице данные
        Blog::truncate();

        $faker = \Faker\Factory::create();

        // Генерация 50-ти статей
        for ($i = 0; $i < 50; $i++) {
            Blog::create([
                'title' => $faker->sentence,
                'description' => $faker->sentence,
                'article' => $faker->paragraph,
            ]);
        }
    }
}
