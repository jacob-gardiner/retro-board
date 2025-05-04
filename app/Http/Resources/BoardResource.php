<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BoardResource extends JsonResource
{
    public function toArray(Request $request): array
    {
//        dd($this->resource->timer_started_at);
        return [
            'id' => $this->resource->id,
            'team_id' => $this->resource->team_id,
            'title' => $this->resource->title,
            'created_by' => $this->resource->created_by,
            'created_diff_for_humans' => $this->resource->created_at->diffForHumans(),
            'timer_started_at' => $this->resource->timer_started_at?->toIso8601String(),
            'timer_duration' => $this->resource->timer_duration,
            'timer_duration_remaining' => $this->resource->timer_duration_remaining,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
            $this->mergeWhen($this->resource->relationLoaded('columns'), [
                'columns' => ColumnResource::collection($this->whenLoaded('columns')),
            ]),
        ];
    }
}
