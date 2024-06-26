<?php

namespace App\Http\Resources;

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
        // return parent::toArray($request);
        
        return 
            [
                'title' => $this->title,
                'body' => $this->body,
                'writer' => $this->user->name ?? 'N/A',
                'comments_bodies' => $this->comments->pluck('body')->toArray(),
            ];
    }
}
