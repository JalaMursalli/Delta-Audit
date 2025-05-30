<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'sub_title'=>$this->sub_title,
            'image'=>!is_null($this) ? asset($this->image) : null,
            'video'      => $this->video ? asset($this->video) : null,
        ];
    }
}
