<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\category\CategoryResourse;
use App\Http\Resources\tag\TagResourse;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResourse extends JsonResource
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
            'content' => $this->content,
            'image' => $this->image,
            'category' => new CategoryResourse($this->category),
            'tags' => TagResourse::collection($this->tags)
        ];
    }
}
