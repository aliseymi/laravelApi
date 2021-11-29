<?php

namespace App\Http\Resources\v2;

use App\Http\Resources\v2\EpisodeCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
            'body' => Str::limit($this->body,100),
            'price' => $this->price,
            'image' => $this->image,
            'date' => jdate($this->created_at)->format('Y/m/d H:i:s'),
            'episodes' => new EpisodeCollection($this->episodes)
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }
}
