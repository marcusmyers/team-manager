<?php
namespace Marcusmyers\TeamManager\Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Marcusmyers\TeamManager\Models\Coach;

class CoachFactory extends Factory
{
    public function modelName()
    {
        return Coach::class;
    }

    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'email' => $this->faker->email,
            'bio' => $this->faker->paragraph,
            'avatar' => $this->faker->imageUrl('200', '200', 'people'),
        ];
    }
}
