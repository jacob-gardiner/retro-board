<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'team_id' => $this->resource->team_id,
            'title' => $this->resource->title,
            'created_by' => $this->resource->created_by,
            'created_diff_for_humans' => $this->resource->created_at->diffForHumans(),
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
            $this->mergeWhen($this->resource->relationLoaded('columns'), [
                'columns' => ColumnResource::collection($this->whenLoaded('columns')),
            ]),
        ];
    }
}
