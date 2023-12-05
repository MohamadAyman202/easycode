<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'site_name' => $this->site_name,
            'icon'      => $this->icon,
            'phone'     => $this->phone,
            'facebook'  => $this->facebook,
            'whatsapp'  => $this->whatsapp,
            'instagram' => $this->instagram,
        ];
    }
}
