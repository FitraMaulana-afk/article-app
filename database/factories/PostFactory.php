<?php

namespace Database\Factories;

use App\Enums\PostStatusEnum;
use App\Enums\PublishStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'title' => \fake()->title(),
            'description' => \fake()->text(),
            'image' => UploadedFile::fake()->image('image.jpg'),
            'link' => \fake()->name(),
            'slug' => \fake()->slug(),
        ];
    }

    public function publish()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => PublishStatusEnum::status['PUBLISH'],
            ];
        });
    }

    public function draft()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => PublishStatusEnum::status['DRAFT'],
            ];
        });
    }

    public function pending()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => PublishStatusEnum::status['PENDING'],
            ];
        });
    }

    public function main()
    {
        return $this->state(function (array $attributes) {
            return [
                'post_status' => PostStatusEnum::post_status['MAIN'],
            ];
        });
    }

    public function normal()
    {
        return $this->state(function (array $attributes) {
            return [
                'post_status' => PostStatusEnum::post_status['NORMAL'],
            ];
        });
    }
}
