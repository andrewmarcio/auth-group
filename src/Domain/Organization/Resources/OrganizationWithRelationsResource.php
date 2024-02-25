<?php

namespace Domain\Organization\Resources;

use Domain\SalesGroup\Resources\SalesGroupResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationWithRelationsResource extends JsonResource
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
            "sales_group_id" => $this->sales_group_id,
            "sales_group" => SalesGroupResource::make($this->salesGroup),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
