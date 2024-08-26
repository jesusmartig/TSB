<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'type' => 'citie',
            'id' => (string) $this->resource->id,
            'attributes' => [
                'name' => $this->resource->name,
                'email' => $this->resource->email,
                'password' => $this->resource->password,
                'typeDocument' => $this->resource->typeDocument,
                'numDocument' => $this->resource->numDocument,
                'digit' => $this->resource->digit,
                'expeditionDate' => $this->resource->expeditionDate,
                'expeditionPlace' => $this->resource->expeditionPlace,
                'departament' => $this->resource->departament,
                'city' => $this->resource->city,
                'gender' => $this->resource->gender,
                'address' => $this->resource->address,
                'telephone' => $this->resource->telephone,
                'cellphone' => $this->resource->cellphone,
                'avatar' => $this->resource->avatar,
                'rol' => $this->resource->rol,
                'transport' => $this->resource->transport,
                'status' => $this->resource->status,
                'last_login' => $this->resource->last_login,
                'created' => $this->resource->created_at,
                'updated' => $this->resource->updated_at,
            ],
            'links' => [
                'self' => route('cities.show', $this->resource->id),
            ]
        ];
    }
}
