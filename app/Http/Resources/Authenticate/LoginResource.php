<?php

namespace App\Http\Resources\Authenticate;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            'type' => 'Bearer',
            'id' => $this->resource->id,
            'token' => $this->resource->createToken("API TOKEN")->plainTextToken,
            'attributes' => [
                'name' => $this->resource->name,
                'email' => $this->resource->email,
                'created_at' => $this->resource->created_at,
                'updated_at' => $this->resource->updated_at,
            ]
        ];


    }
}
