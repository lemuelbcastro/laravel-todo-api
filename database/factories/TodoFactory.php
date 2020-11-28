<?php

namespace Database\Factories;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $completed = $this->faker->boolean;
        $scheduleDate = $this->faker->dateTimeBetween(
            $completed ? '-1 week' : 'now',
            $completed ? 'now' : '+1 week'
        );

        return [
            'name' => $this->faker->bs,
            'author_id' => User::inRandomOrder()->first(),
            'schedule_date' => $scheduleDate->format('Y-m-d'),
            'completed' => $completed,
        ];
    }
}
