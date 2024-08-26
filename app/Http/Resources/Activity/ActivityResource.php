<?php

namespace App\Http\Resources\Activity;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'type' => 'activity',
            'id' => (string)$this->resource->id,
            'attributes' => [
                'activityCode' => $this->resource->activityCode,
                'activity' => $this->resource->activity,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('activity.show', $this->resource->id),
            ]
        ];
    }
}
