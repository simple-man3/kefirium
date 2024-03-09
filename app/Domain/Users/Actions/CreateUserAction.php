<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\User;
use Illuminate\Support\Arr;

class CreateUserAction
{
    public function execute(array $fields): User
    {
        $user = new User();
        $user->fill(Arr::only($fields, User::FILLABLE));
        $user->save();

        return $user;
    }
}
