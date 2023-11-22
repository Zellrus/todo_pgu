<?php

namespace App\Http\Resources\Column;

use App\Http\Resources\Task\TaskResource;
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
            'id'=>$this->id,
            'project_id'=>$this->project_id,
            'title'=>$this->title,
            'color'=>$this->color,
            'tasks'=> TaskResource::collection($this->task),
        ];
    }
}
