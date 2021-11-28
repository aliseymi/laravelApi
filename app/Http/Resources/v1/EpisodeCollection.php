<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EpisodeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return $this->collection->map(function ($item) {
//                return [
//                    'title' => $item->title,
//                    'body' => $item->body,
//                    'episode_number' => $item->number
//                ];
//            });

        return [
            'data' => $this->collection->map(function ($item){
                return [
                    'title' => $item->title,
                    'body' => $item->body,
                    'episode_number' => $item->number
                ];
            })
        ];

    }
}
