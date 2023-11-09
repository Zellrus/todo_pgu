<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectResource;
use App\Models\User;

class ShowProject extends Controller
{
    public function __invoke()
    {
        $projects = User::find(auth()->user()->id)->projects;
        return ProjectResource::collection($projects);
//          dd($projects);
         //return response($projects);
        // return response(200);
    }
}
