<?php

namespace App\Http\Resources\Departments;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartmentsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => route('departments.index')
            ]
        ];
    }
}
