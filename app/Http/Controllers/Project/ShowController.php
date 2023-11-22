<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Column\ColumnResource;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\OneProjectResource;

use App\Models\Project;
use App\Models\User;

class ShowController extends Controller
{
    public function all()
    {
        $projects = (User::find(auth()->user()->id)->projects);
        return ProjectResource::collection($projects);
    }
    public function one(Project $project)
    {
     return new OneProjectResource($project);
    }

}
