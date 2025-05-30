<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoResource extends JsonResource
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
            'meta_title'=>$this?->meta_title ?? null,
            'meta_description'=>$this?->meta_description ?? null,
        ];
    }
}
