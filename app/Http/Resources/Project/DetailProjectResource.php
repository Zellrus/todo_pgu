<?php

namespace App\Http\Resources\Project;


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'color'=>$this->color,
            'description'=>$this->description,
            'columns'=> \App\Http\Resources\Column\ColumnResource::collection($this->columns),
        ];
    }
}
