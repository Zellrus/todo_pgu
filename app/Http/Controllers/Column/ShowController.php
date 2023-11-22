<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Http\Resources\Column\ColumnResource;

use App\Http\Resources\Task\TaskResource;
use App\Models\Column;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ShowController extends Controller
{
    public function all($id)
    {
        $project=Project::find($id);
        return ColumnResource::collection($project->columns);
    }
    public function one($id)
    {
        $column = Column::find($id);
        return new ColumnResource($column);
    }

}
