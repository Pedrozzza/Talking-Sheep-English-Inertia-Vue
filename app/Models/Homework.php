<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Homework extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'homework_number',
        'file',
        'checked',
        'evaluation',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
