<?php

namespace App\Http\Resources\Banks;

use Illuminate\Http\Resources\Json\JsonResource;

class BanksResource extends JsonResource
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
            'type' => 'banks',
            'id' => $this->resource->id,
            'attributes' => [
                'banksName' => $this->resource->banksName,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('banks.index', $this->resource->id),
            ]
        ];
    }
}
