<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
        'title' => $this->title ?? null,
        'short_description' => $this->short_description ?? null,
        'description' => $this->description ?? null,
        'image'=>!is_null($this) ? asset($this->image) : null,
        'icon'=>!is_null($this) ? asset($this->icon) : null,
        ];
    }
}
