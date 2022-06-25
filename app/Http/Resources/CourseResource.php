<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CourseResource extends JsonResource
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
            'slug' => $this->slug,
            'description' => $this->description,
            'main_description' => $this->main_description,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'destination' => $this->destination,
            'price' => $this->price,
            'image' => $this->image,
            'show_button' => $this->show_button,
            'created_at_for_human' => $this->created_at->diffForHumans(),
            'users' => $this->users,
            'url' => $this->url,
            'images' => $this->images
        ];
    }
}
