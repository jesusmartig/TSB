<?php

namespace App\Http\Resources\Vehicles;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VehiclesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => route('activity.index'),
            ]

        ];
    }
}
