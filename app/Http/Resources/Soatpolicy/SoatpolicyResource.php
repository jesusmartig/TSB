<?php

namespace App\Http\Resources\Soatpolicy;

use Illuminate\Http\Resources\Json\JsonResource;

class SoatpolicyResource extends JsonResource
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
            'type' => 'Soat policy',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'policyNumber' => $this->resource->policyNumber,
                'expeditionDate' => $this->resource->expeditionDate,
                'startDateValidity' => $this->resource->startDateValidity,
                'expirationDate' => $this->resource->expirationDate,
                'rateType' => $this->resource->rateType,
                'insurerName' => $this->resource->insurerName,
                'status' => $this->resource->status,
                'shares' => $this->resource->shares,
                'vehicle' => $this->resource->vehicle,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('soat.show', $this->resource->id),
            ]
        ];
    }
}
