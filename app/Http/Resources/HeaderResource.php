<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeaderResource extends JsonResource
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
            'phone_title'=>$this?->phone_title ?? null,
             'phone_icon'=>!is_null($this) ? asset($this->phone_icon) : null,
            'image'=>!is_null($this) ? asset($this->image) : null,
            'fav_icon'=>!is_null($this) ? asset($this->fav_icon) : null,
        ];
    }
}
