<?php

namespace App\Http\Resources\Citie;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CitieCollection extends ResourceCollection
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
                'self' => route('cities.index'),
            ]

        ];
    }
}
