<?php

namespace App\Http\Resources\Citie;

use Illuminate\Http\Resources\Json\JsonResource;

class CitieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'type' => 'citie',
            'id' => (string) $this->resource->id,
            'attributes' => [
                'cities' => $this->resource->cities,
                'department' => $this->resource->department,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('cities.show', $this->resource->id),
            ]
        ];
    }
}
