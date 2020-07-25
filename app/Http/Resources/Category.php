<?php

namespace App\Http\Resources;

use App\Article;
use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
            'name' => $this->name,
            'articles'=>'/api/Category/'.$this->id.'/articles',
        ];
    }
}
