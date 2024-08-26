<?php

namespace App\Http\Resources\TypesSociety;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TypesSocietyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => route('types.society.index'),
            ]
        ];
    }
}
