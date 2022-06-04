<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
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
            'description' => $this->description,
            'color' => $this->color,
            'visibility' => $this->visibility,
            'image' => $this->image,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.m.Y'),
            'posts' => $this->posts
        ];
    }
}
