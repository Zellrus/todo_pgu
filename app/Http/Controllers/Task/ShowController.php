<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Resources\Task\TaskResource;
use App\Models\Column;
use App\Models\Task;


class ShowController extends Controller
{
    public function all($id)
    {
        $column=Column::find($id);
        return TaskResource::collection($column->task);
    }
    public function one($id)
    {
        $task=Task::find($id);
        return new TaskResource($task);
    }
}
