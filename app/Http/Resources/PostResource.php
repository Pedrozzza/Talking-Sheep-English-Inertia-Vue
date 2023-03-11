<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'color' => $this->color,
            'folder' => $this->folder->id,
            'folder_title' => $this->folder->title,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.m.Y'),
            'file_upload' => $this->file_upload,
            'file_upload1' => $this->file_upload1,
            'file_upload2' => $this->file_upload2,
            'file_upload3' => $this->file_upload3,
            'file_upload4' => $this->file_upload4,
            'file_homework' => $this->file_homework,
            'file_homework1' => $this->file_homework1,
            'file_homework2' => $this->file_homework2,
            'file_homework3' => $this->file_homework3,
            'file_homework4' => $this->file_homework4,
            'file_conversation' => $this->file_conversation,
        ];
    }
}
