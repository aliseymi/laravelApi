<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;
use Morilog\Jalali\Jalalian;

class Course extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'image' => $this->image,
            'createTime' => jdate($this->created_at)->format('Y/m/d H:i:s'),
            'episodes' => new EpisodeCollection($this->episodes)
        ];
    }
}
