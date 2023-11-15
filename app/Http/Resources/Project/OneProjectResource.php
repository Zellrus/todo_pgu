<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OneProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'project'=> new ProjectResource($this),
            'task'=> TaskResource::collection($this->tasks),
        ];
    }
}
