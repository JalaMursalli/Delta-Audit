<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'sub_title'=>$this?->sub_title ?? null,
            'address_title'=>$this?->address_title ?? null,
            'voen_title'=>$this?->voen_title ?? null,
            'email_title'=>$this?->email_title ?? null,
            'phone_title'=>$this?->phone_title ?? null,
            'address_icon'=>!is_null($this) ? asset($this->address_icon) : null,
            'voen_icon'=>!is_null($this) ? asset($this->voen_icon) : null,
            'email_icon'=>!is_null($this) ? asset($this->email_icon) : null,
            'phone_icon'=>!is_null($this) ? asset($this->phone_icon) : null,
            'map' => $this->map ?? null
        ];
    }
}
