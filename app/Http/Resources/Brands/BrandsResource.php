<?php

namespace App\Http\Resources\Brands;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'brands',
            'id' => $this->resource->id,
            'attributes' => [
                'name' => $this->resource->name,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('brands.show', $this->resource->id)
            ]
        ];
    }
}
