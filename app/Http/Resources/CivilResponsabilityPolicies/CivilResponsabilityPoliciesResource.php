<?php

namespace App\Http\Resources\CivilResponsabilityPolicies;

use Illuminate\Http\Resources\Json\JsonResource;

class CivilResponsabilityPoliciesResource extends JsonResource
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
            'type' => 'Civil Responsability Policies',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'policyNumber' => $this->resource->policyNumber,
                'expeditionDate' => $this->resource->expeditionDate,
                'startDateValidity' => $this->resource->startDateValidity,
                'expirationDate' => $this->resource->expirationDate,
                'insurerName' => $this->resource->insurerName,
                'policyType' => $this->resource->policyType,
                'status' => $this->resource->status,
                'takerDocumentType' => $this->resource->takerDocumentType,
                'takerDocumentNumber' => $this->resource->takerDocumentNumber,
                'shares' => $this->resource->shares,
                'vehicle' => $this->resource->vehicle,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('civilresponsabilitypolicies.show', $this->resource->id),
            ]
        ];
    }
}
