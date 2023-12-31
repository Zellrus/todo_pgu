<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\Column\ColumnResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
           'title'=>$this->title,
           'color'=>$this->color,
           'description'=>$this->description,
//           'columns'=> ColumnResource::collection($this->columns),
        ];
    }
}
