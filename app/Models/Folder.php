<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'color',
        'visibility',
        'image',
    ];

    public function posts():HasMany
    {
        return $this->hasMany(Post::class);
    }
}
