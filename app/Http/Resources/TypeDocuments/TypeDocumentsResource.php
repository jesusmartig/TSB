<?php

namespace App\Http\Resources\TypeDocuments;

use Illuminate\Http\Resources\Json\JsonResource;

class TypeDocumentsResource extends JsonResource
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
            'type' => 'type documents',
            'id' => $this->resource->id,
            'attributes' => [
                'name' => $this->resource->name,
                'prefix' => $this->resource->prefix,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('type-documents.show', $this->resource->id),
            ]
        ];
    }
}
