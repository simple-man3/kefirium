<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class GetUserAction
{
    public function execute(int $id): Model
    {
        return User::query()->findOrFail($id, 'id');
    }
}
