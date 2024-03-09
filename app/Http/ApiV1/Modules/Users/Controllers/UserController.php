<?php

namespace App\Http\ApiV1\Modules\Users\Controllers;

use App\Domain\Users\Actions\CreateUserAction;
use App\Domain\Users\Actions\GetUserAction;
use App\Domain\Users\Actions\GetUserByPasswordAction;
use App\Http\ApiV1\Modules\Users\Requests\CreateUserRequest;
use App\Http\ApiV1\Modules\Users\Requests\GetUserByPasswordRequest;
use App\Http\ApiV1\Modules\Users\Resources\UserResource;

class UserController
{
    public function get(GetUserAction $action, int $id): UserResource
    {
        return new UserResource($action->execute($id));
    }

    public function create(CreateUserRequest $request, CreateUserAction $action): UserResource
    {
        return new UserResource($action->execute($request->validated()));
    }

    public function getUserByPassword(GetUserByPasswordRequest $request, GetUserByPasswordAction $action): UserResource
    {
        return new UserResource($action->execute($request->validated()));
    }
}
