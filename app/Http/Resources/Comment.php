<?php

namespace App\Http\Resources;
use App\Article;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'article'=>Article::find($this->article_id),
            'user'=>User::find($this->user_id),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
