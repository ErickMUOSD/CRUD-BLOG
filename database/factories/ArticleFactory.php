<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{

    protected  $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this ->faker->sentence,
            'img'=> $this ->faker->imageUrl($width = 640, $height = 480),
            'subtitle'=> $this ->faker->sentence,
            'body'=> $this ->faker->paragraph(2),
            /* definos nuestra llaves foraneas */
            'category_id'=> Category::all()->random()->id,
            'img_id'=> Images::all()->random()->id
        ];
    }
}
