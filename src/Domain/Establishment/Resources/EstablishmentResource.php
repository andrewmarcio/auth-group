<?php

namespace Domain\Establishment\Resources;

use Domain\Address\Resources\AddressResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstablishmentResource extends JsonResource
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
            "name" => $this->name,
            "description" => $this->description,
            "configs" => $this->configs,
            "establishment_id" => $this->establishment_id,
            "organization_id" => $this->organization_id,
            "type" => $this->type,
            "address" => AddressResource::make($this->address),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
