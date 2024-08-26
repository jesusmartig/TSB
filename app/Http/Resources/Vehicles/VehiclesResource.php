<?php

namespace App\Http\Resources\Vehicles;

use Illuminate\Http\Resources\Json\JsonResource;

class VehiclesResource extends JsonResource
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
            'type' => 'vehicles',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'vehiclePlate' => $this->resource->vehiclePlate,
                'transitLicense' => $this->resource->transitLicense,
                'vehicleStatus' => $this->resource->vehicleStatus,
                'typeService' => $this->resource->typeService,
                'vehicleClass' => $this->resource->vehicleClass,
                'brand' => $this->resource->brand,
                'line' => $this->resource->line,
                'model' => $this->resource->model,
                'color' => $this->resource->color,
                'serialNumber' => $this->resource->serialNumber,
                'engineNumber' => $this->resource->engineNumber,
                'chassisNumber' => $this->resource->chassisNumber,
                'vinNumber' => $this->resource->vinNumber,
                'cylinderCapacity' => $this->resource->cylinderCapacity,
                'bodyType' => $this->resource->bodyType,
                'fuelType' => $this->resource->fuelType,
                'initialRegistrationDate' => $this->resource->initialRegistrationDate,
                'transitAuthority' => $this->resource->transitAuthority,
                'doors' => $this->resource->doors,
                'LoadingCapacity' => $this->resource->LoadingCapacity,
                'vehicleGrossWeight' => $this->resource->vehicleGrossWeight,
                'seatedPassengerCapacity' => $this->resource->seatedPassengerCapacity,
                'numberAxles' => $this->resource->numberAxles,
                'proprietor' => $this->resource->proprietor,
                'documentType' => $this->resource->documentType,
                'numDocument' => $this->resource->numDocument,
                'prefix' => $this->resource->prefix,
                'className' => $this->resource->className,
                'brandsName' => $this->resource->brandsName,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('vehicles.show', $this->resource->id),
            ]
        ];
    }
}
