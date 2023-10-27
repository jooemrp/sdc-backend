<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Factory as faker;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = faker::create('id_ID');

        $paragraphs = $this->faker->paragraphs(rand(2, 50));
        $title = $this->faker->realText(50);
        $post = "<h1>{$title}</h1>";
        foreach ($paragraphs as $para) {
            $post .= "<p>{$para}</p>";
        }

        return [
            'title' => $faker->sentence(),
            'slug' => $faker->slug(),
            'body' => $post,
            'type' => 'article',
            'status' => $faker->numberBetween(0, 1),
            'comment_status' => $faker->numberBetween(0, 1),
            'views' => $faker->numberBetween(0, 100000),
            'parent_id' => null,
            'language' => 'id',
            'meta_title' => $faker->title(),
            'meta_description' => $faker->paragraph(),
            'tags' => [$faker->word(), $faker->word()],
            // 'created_by' => User::all()->random()->id,
            'created_by' => 1,
            'featured_at' => null,
        ];
    }
}
