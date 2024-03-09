<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\User;
use App\Exceptions\NotFoundException;

class GetUserByPasswordAction
{
    public function execute(array $fields): User
    {
        /** @var User $user */
        $user = User::query()
            ->where('login', $fields['login'])
            ->where('password', $fields['password'])
            ->first();

        if (is_null($user)) {
            throw new NotFoundException('User not found');
        }

        return $user;
    }
}
