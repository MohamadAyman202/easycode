<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'             => $this->title,
            'meta_description'  => $this->meta_description,
            'description'       => $this->description,
            'link_website'      => $this->link_website,
            'image'             => asset($this->image),
            'skills'            => $this->skills,
        ];
    }
}
