<?php

namespace App\Http\Resources\OperationCard;

use Illuminate\Http\Resources\Json\JsonResource;

class OperationCardResource extends JsonResource
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
            'type' => 'Operation Card',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'affiliateCompany' => $this->resource->affiliateCompany,
                'modeTransport' => $this->resource->modeTransport,
                'serviceModality' => $this->resource->serviceModality,
                'actionRatio' => $this->resource->actionRatio,
                'expeditionDate' => $this->resource->expeditionDate,
                'validitystartDate' => $this->resource->validitystartDate,
                'expirationDate' => $this->resource->expirationDate,
                'operationcard' => $this->resource->operationcard,
                'status' => $this->resource->status,
                'operationcardType' => $this->resource->operationcardType,
                'shares' => $this->resource->shares,
                'vehicle' => $this->resource->vehicle,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('operationcard.show', $this->resource->id),
            ]
        ];
    }
}
