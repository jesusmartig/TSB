<?php

namespace App\Http\Resources\Mechanicaltechnicalreview;

use Illuminate\Http\Resources\Json\JsonResource;

class MechanicaltechnicalreviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'Mechanicaltechnicalreview',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'revisionType' => $this->resource->revisionType,
                'expeditionDate' => $this->resource->expeditionDate,
                'effectiveDate' => $this->resource->effectiveDate,
                'cdaSssuesRtm' => $this->resource->cdaSssuesRtm,
                'valid' => $this->resource->valid,
                'certificate' => $this->resource->certificate,
                'shares' => $this->resource->shares,
                'vehicle' => $this->resource->vehicle,
                'status' => $this->resource->status,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('rtm.show', $this->resource->id),
            ]
        ];
    }
}
