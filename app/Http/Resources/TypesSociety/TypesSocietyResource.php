<?php

namespace App\Http\Resources\TypesSociety;

use Illuminate\Http\Resources\Json\JsonResource;

class TypesSocietyResource extends JsonResource
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
            'type' => 'Types society',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'name' => $this->resource->name,
                'prefix' => $this->resource->prefix,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'link' => [
                'self' => route('types.society.show', $this->resource->id),
            ]
        ];
    }
}
