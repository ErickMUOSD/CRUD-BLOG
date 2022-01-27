<?php
namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Images;
use App\Models\Tags;
use Illuminate\Support\Facades\DB;
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
        $this->call([UsersTableSeeder::class]);
        Category::factory(10)->create();
        Images::factory(1)->create();
        Tags::factory(1)->create();
        Article::factory(1)->create();
    }
}
