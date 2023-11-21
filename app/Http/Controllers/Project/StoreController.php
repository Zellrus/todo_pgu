<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
//       $users = $data['users'];
//      unset($data['users']);
        //dd(auth()->user()->id);
        $project= Project::create($data);

        //завтра добавишь attach для колонок_проджектов шоб добавить айдишники колонок в бд


//        \App\Http\Controllers\Column\StoreController();
        $project->users()->attach(auth()->user()->id);
//      $project->users()->attach($users);
      return new ProjectResource($project);
    }
}
