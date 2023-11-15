<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Task\TaskResource;
use App\Models\Project;
use App\Models\User;

class ShowController extends Controller
{
    public function all()
    {
        $projects = (User::find(auth()->user()->id)->projects);
        //$columns = $projects->columns;
//        dd($projects);
        return ProjectResource::collection($projects);
//          dd($projects);
         //return response($projects);
        // return response(200);
    }
    public function one(Project $project)
    {
     return TaskResource::collection( $project->tasks);
    }
}
