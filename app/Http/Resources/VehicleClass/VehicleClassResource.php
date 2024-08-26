<?php

namespace App\Http\Resources\VehicleClass;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleClassResource extends JsonResource
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
            'type' => 'Vehicle Class',
            'id' => $this->resource->id,
            'attributes' => [
                'prefix' => $this->resource->prefix,
                'className' => $this->resource->className,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('vehicleClass.show', $this->resource->id)
            ]
        ];
    }
}
