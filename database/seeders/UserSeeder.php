<?php

namespace Database\Seeders;

use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->withLogin('customLogin')
            ->withEmail('example@gmail.com')
            ->withPassword('custom123456')
            ->createOne();
    }
}
