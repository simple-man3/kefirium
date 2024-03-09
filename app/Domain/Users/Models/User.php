<?php

namespace App\Domain\Users\Models;

use App\Domain\Users\Models\Tests\UserFactory;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $password
 *
 * @property CarbonInterface $deleted_at
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
class User extends Authenticatable
{
    use HasFactory;

    protected $softDelete = true;

    public const FILLABLE = [
        'login',
        'email',
        'password',
    ];

    protected $fillable = self::FILLABLE;

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function factory(): UserFactory
    {
        return UserFactory::new();
    }
}
