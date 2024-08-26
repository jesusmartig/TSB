<?php

namespace App\Http\Resources\VehicleClass;

use Illuminate\Http\Resources\Json\ResourceCollection;

class VehicleClassCollection extends ResourceCollection
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
                'self' => route('vehicleClass.index'),
            ]
        ];
    }
}
