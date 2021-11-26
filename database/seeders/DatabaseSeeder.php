<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Images;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(5)->create();
        Images::factory(5)->create();
        Tags::factory(5)->create();
        Article::factory(5)->create();

    }
}
