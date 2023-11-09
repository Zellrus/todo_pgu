<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class StoreProject extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
//       $users = $data['users'];
//      unset($data['users']);
        //dd(auth()->user()->id);
        $project= Project::create($data);
        $project->users()->attach(auth()->user()->id);
//      $project->users()->attach($users);
      return new ProjectResource($project);
    }
}
