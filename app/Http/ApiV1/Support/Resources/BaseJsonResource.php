<?php

namespace App\Http\ApiV1\Support\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

abstract class BaseJsonResource extends JsonResource
{
    protected function whenNotNull($value, $default = null)
    {
        if (!is_null($value)) {
            return value($value);
        }

        return func_num_args() === 2 ? value($default) : new MissingValue;
    }
}
