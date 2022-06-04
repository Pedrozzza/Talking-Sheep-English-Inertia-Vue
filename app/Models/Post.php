<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'folder_id',
        'user_id',
        'color',
        'file_upload',
        'file_upload1',
        'file_upload2',
        'file_upload3',
        'file_upload4',
        'file_homework',
        'file_conversation'
    ];

    public function folder():BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }
}
