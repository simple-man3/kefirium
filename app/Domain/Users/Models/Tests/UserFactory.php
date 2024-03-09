<?php

namespace App\Domain\Users\Models\Tests;

use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @method User createOne($attributes = [])
 * @method User makeOne($attributes = [])
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'login' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->email,
            'password' => $this->faker->password,
        ];
    }

    public function withEmail(string $email): static
    {
        return $this->state(['email' => $email]);
    }

    public function withLogin(string $login): static
    {
        return $this->state(['login' => $login]);
    }

    public function withPassword(string $password): static
    {
        return $this->state(['password' => Hash::make($password)]);
    }
}
