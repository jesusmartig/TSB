<?php

namespace App\Http\Resources\Socialsecurity;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialsecurityResource extends JsonResource
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
            'type' => 'activity',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'contributor' => $this->resource->contributor,
                'contributorDocument' => $this->resource->contributorDocument,
                'form' => $this->resource->form,
                'typesReturns' => $this->resource->typesReturns,
                'pensionperiod' => $this->resource->pensionperiod,
                'healthperiod' => $this->resource->healthperiod,
                'shares' => $this->resource->shares,
                'status' => $this->resource->status,
                'driver' => $this->resource->driver,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('socialsecurity.show', $this->resource->id),
            ]
        ];
    }
}
