<?php

namespace Database\Factories;

use App\Models\Images;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagesFactory extends Factory
{
    protected  $model = Images::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->word,
//             'path'=> $this->faker->imageUrl($width = 640, $height = 480, 'cats'),
        ];
    }
}
