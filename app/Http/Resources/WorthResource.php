<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ?? null,
            'title' => $this->title ?? null,
            'sub_title' => $this->sub_title ?? null,
            'icon'=>!is_null($this) ? asset($this->icon) : null,
            'w_number' => $this->w_number ?? null
        ];
    }
}
