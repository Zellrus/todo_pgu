<?php

namespace App\Http\Resources\Task;

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
            'project_id'=>$this->project_id,
            'column_id'=>$this->column_id,
            'column_title'=>$this->column->title,
            'id'=>$this->id,
            'name'=>$this->name,
            'color'=>$this->color,
            'description'=>$this->description,
            'deadline'=>$this->deadline,
        ];
    }
}
