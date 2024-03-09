<?php

namespace App\Http\ApiV1\Modules\Users\Resources;

use App\Domain\Users\Models\User;
use App\Http\ApiV1\Support\Resources\BaseJsonResource;
use Illuminate\Http\Request;

/** @mixin User */
class UserResource extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'password' => $this->password,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
