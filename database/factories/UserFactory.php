<?php
# @Date:   2021-01-05T16:23:56+00:00
# @Last modified time: 2021-03-09T16:35:37+00:00




namespace Database\Factories;

use App\Models\User;
use Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' =>  Hash::make('secret'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
