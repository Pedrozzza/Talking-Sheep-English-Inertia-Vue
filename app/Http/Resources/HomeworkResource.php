<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeworkResource extends JsonResource
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
            'user_id' => $this->user_id,
            'name' => $this->name,
            'homework_number' => $this->homework_number,
            'file' => $this->file,
            'checked' => $this->checked,
            'created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.m.Y')
        ];
    }
}
