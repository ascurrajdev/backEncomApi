<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'date' => $this->resource->overdue->format('Y-m-d'),
            'sourceId' => $this->resource->sourceId,
            'status' => $this->resource->status,
            'data' => $this->resource->data,
            'companyId' => $this->resource->companyId,
            'outletId' => $this->resource->outletId,
            'created_at' => $this->resource->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
