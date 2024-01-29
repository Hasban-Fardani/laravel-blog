<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'image' => $this->image,
            'category_id' => $this->category_id,
            'category' => new CategoryResource($this->category),
            'views' => $this->views,
            'status' => $this->status,
            'user_id' => $this->user_id,
            'user' => new UserResource($this->user),
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
