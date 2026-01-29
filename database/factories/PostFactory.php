<?php

namespace Database\Factories;

use App\Models\Post; // Make sure your Post model is imported    // Assuming you have a User model for author
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_title' => $this->faker->sentence, // A sentence for the title
            'post_img' => 'assets/img/feature-1.jpg', 
            'post_category' => $this->faker->numberBetween(1, 4),
            'post_content' => $this->faker->paragraphs(rand(3, 7), true), // 3-7 paragraphs of text
            'post_status' => $this->faker->randomElement(['published', 'draft', 'pending']), // Random status
            'author' => 'somor',
            'slug' => Str::slug($this->faker->unique()->sentence(5)), // Generates a unique slug from a sentence
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date within the last year
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date within the last year
        ];
    }

    /**
     * Define a state for a published post.
     */
    public function published(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'post_status' => 'published',
        ]);
    }

    /**
     * Define a state for a draft post.
     */
    public function draft(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'post_status' => 'draft',
        ]);
    }
}