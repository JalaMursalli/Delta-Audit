<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this?->id ?? null,
            'title'=>$this?->title ?? null,
            'description'=>$this?->description ?? null,
            'image1'=>!is_null($this) ? asset($this->image1) : null,
            'image2'=>!is_null($this) ? asset($this->image2) : null,
        ];
    }
}
