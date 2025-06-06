<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
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
        'sub_title' => $this->title ?? null,
        'image'=>!is_null($this) ? asset($this->image) : null,
        ];
    }
}
