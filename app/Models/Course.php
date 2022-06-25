<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'main_description',
        'date_start',
        'date_end',
        'destination',
        'price',
        'image',
        'url',
        'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function uploadFolder(): string
    {
        return 'public/courses';
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
