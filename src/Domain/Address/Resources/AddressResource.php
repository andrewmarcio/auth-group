<?php

namespace Domain\Address\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "street" => $this->street,
            "neighborhood" => $this->neighborhood,
            "city" => $this->city,
            "uf" => $this->uf,
            "number" => $this->number,
            "location" => $this->location,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
