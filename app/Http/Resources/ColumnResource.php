<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ColumnResource extends JsonResource
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
            'board_id' => $this->resource->board_id,
            'title' => $this->resource->title,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
            $this->mergeWhen($this->resource->relationLoaded('cards'), [
                'cards' => CardResource::collection($this->whenLoaded('cards')),
            ]),
        ];
    }
}
