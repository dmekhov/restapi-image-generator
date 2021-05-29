<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'ratio',
        'published',
    ];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
