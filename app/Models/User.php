<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_BANNED = 2;

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function ratio()
    {
        return (int) round($this->reviews()->published()->avg('ratio') ?? 0);
    }
}
