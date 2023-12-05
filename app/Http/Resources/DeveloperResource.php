<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeveloperResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'              => $this->name,
            'meta_description'  => $this->meta_description,
            'description'       => $this->description,
            'job_title'         => $this->job_title,
            'skills'            => $this->skills,
            'image'             => asset($this->image),
        ];
    }
}
