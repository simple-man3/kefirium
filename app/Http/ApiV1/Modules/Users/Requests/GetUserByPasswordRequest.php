<?php

namespace App\Http\ApiV1\Modules\Users\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class GetUserByPasswordRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required'],
            'password' => ['required'],
        ];
    }
}
