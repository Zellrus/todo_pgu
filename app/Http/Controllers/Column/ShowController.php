<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Http\Resources\Column\ColumnResource;
use App\Http\Resources\Column\OneColumnResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\Column;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ShowController extends Controller
{
    public function all()
    {
        $columns = (User::find(auth()->user()->id)->projects->columns);
        //$columns = $projects->columns;
//        dd($projects);
        return ProjectResource::collection($columns);
//          dd($projects);
         //return response($projects);
        // return response(200);
    }
    public function one(Column $column)
    {
//    $project['tasks'] = $project->tasks;
//    return $project;
     return new OneColumnResource($column);
    }
    public function tasks($id)
    {
        $tasks=Task::find($id);
//        dd($project);
        return $tasks;
        return TaskResource::collection($column->tasks);
    }
}
