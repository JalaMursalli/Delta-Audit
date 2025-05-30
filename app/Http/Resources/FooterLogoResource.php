<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FooterLogoResource extends JsonResource
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
            'description'=>$this?->description ?? null,
            'image'=>!is_null($this) ? asset($this->image) : null,
        ];
    }
}
