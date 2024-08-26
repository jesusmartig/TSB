<?php

namespace App\Http\Resources\TypeFile;

use Illuminate\Http\Resources\Json\JsonResource;

class TypeFileResource extends JsonResource
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
            'type' => 'Type file',
            'id' => $this->resource->id,
            'attributes' => [
                'name' => $this->resource->name,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route("type-file.show", $this->resource->id),
            ]
        ];
    }
}
