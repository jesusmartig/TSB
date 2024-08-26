<?php

namespace App\Http\Resources\Drivers;

use Illuminate\Http\Resources\Json\JsonResource;

class DriversResource extends JsonResource
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
            'type' => 'Driver',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'typeDocument' => $this->resource->typeDocument,
                'document' => $this->resource->document,
                'expeditionplace' => $this->resource->expeditionplace,
                'expeditiondate' => $this->resource->expeditiondate,
                'nameandsurname' => $this->resource->nameandsurname,
                'gender' => $this->resource->gender,
                'departament' => $this->resource->departament,
                'city' => $this->resource->city,
                'address' => $this->resource->address,
                'email' => $this->resource->email,
                'telephone' => $this->resource->telephone,
                'cellphone' => $this->resource->cellphone,
                'banks' => $this->resource->banks,
                'citizenshipcard' => $this->resource->citizenshipcard,
                'curriculumvitae' => $this->resource->curriculumvitae,
                'status' => $this->resource->status,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('drivers.show', $this->resource->id),
            ]
        ];
    }
}
