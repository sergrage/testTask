<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(6, true);
        $slug = preg_replace('/\s+/', '-', $title );

        return [
           'title' => $title,
           'preview' => $this->faker->paragraph(1, false),
           'body' => $this->faker->paragraph(10, false),
           'views' => 0,
           'likes' => 0,
           'slug' => $slug,
           'created_at' => $this->faker->dateTimeBetween('-1 years'),
        ];
    }
}
