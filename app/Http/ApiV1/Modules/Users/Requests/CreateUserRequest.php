<?php

namespace App\Http\ApiV1\Modules\Users\Requests;

use App\Domain\Users\Models\User;
use App\Http\ApiV1\Support\Requests\BaseFormRequest;
use Closure;
use Illuminate\Validation\Rule;

class CreateUserRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required', Rule::unique(User::class)],
            'email' => ['required', 'email', function (string $attribute, mixed $value, Closure $fail) {
                $valueLow = strtolower($value);
                $exist = User::query()->where('email', $valueLow)->exists();

                if ($exist) {
                    $fail('User with same email exist');
                }
            }],
            'password' => ['required', 'string', 'confirmed', 'min:6'],
        ];
    }
}
