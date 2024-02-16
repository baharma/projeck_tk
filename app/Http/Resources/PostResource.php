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
        $post = parent::toArray($request);
        $post['categories'] = new CategoryResource($this->whenLoaded('categories'));
        $post['author'] = new UserResource($this->whenLoaded('author'));

        return $post;
    }
}
