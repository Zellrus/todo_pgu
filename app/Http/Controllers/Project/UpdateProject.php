<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\UpdateRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class UpdateProject extends Controller
{
    public function __invoke(UpdateRequest $request, Project $project)
    {
            $data= $request->validated();
            $project->update($data);
            return new ProjectResource($project);
//            return response($project,201);
    }
}
