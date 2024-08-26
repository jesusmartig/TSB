<?php

namespace App\Http\Resources\TransportCompany;

use Illuminate\Http\Resources\Json\JsonResource;

class TransportCompanyResource extends JsonResource
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
            'type' => 'TransportCompany',
            'id' => (string) $this->resource->id,
            'attributes' => [
                'nit' => $this->resource->nit,
                'digit' => $this->resource->digit,
                'businessName' => $this->resource->businessName,
                'typePerson' => $this->resource->typePerson,
                'acronym' => $this->resource->acronym,
                'nationalPersontype' => $this->resource->nationalPersontype,
                'typesSociety' => $this->resource->typesSociety,
                'economicSector' => $this->resource->economicSector,
                'department' => $this->resource->department,
                'city' => $this->resource->city,
                'codeFuec' => $this->resource->codeFuec,
                'telephone' => $this->resource->telephone,
                'phone' => $this->resource->phone,
                'direction' => $this->resource->direction,
                'email' => $this->resource->email,
                'typeDocuments' => $this->resource->typeDocuments,
                'document' => $this->resource->document,
                'names' => $this->resource->names,
                'usId' => $this->resource->usId,
                'status' => $this->resource->status,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('transportCompany.show', $this->resource->id)
            ]
        ];
    }
}
