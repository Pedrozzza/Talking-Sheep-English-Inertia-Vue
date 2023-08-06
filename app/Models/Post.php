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
        'file_upload5',
        'file_upload6',
        'file_upload7',
        'file_upload8',
        'file_upload9',
        'file_homework',
        'file_homework1',
        'file_homework2',
        'file_homework3',
        'file_homework4',
        'file_homework5',
        'file_homework6',
        'file_homework7',
        'file_homework8',
        'file_homework9',
        'file_conversation',
        'file_goldlist'
    ];

    public function folder():BelongsTo
    {
        return $this->belongsTo(Folder::class);
    }
}
