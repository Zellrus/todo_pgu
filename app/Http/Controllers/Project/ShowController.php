<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Column\ColumnResource;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\DetailProjectResource;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        if(!isset($data['isdetail'])){
            $data['isdetail'] = true;
        }
        if (isset($data['project_id'])){
            return $this->byProjectId($data['project_id'],$data['isdetail']);
        }
        elseif (empty($data) or isset($data['isdetail'])){
            return $this->responseAllUserProject($data['isdetail']);
        }
        else{
            return response()->json(['message'=>'Нет ни одного параметра (project_id)']);
        }
    }
    private function byProjectId($id,$isdetail=true)
    {

        $project=Project::find($id);
        if (!$project){ return response()->json(['message'=>'Проект не найден']); }
        if ($isdetail){
            return new DetailProjectResource($project);
        }
            return new ProjectResource($project);
    }
    private function responseAllUserProject($isdetail=true){
        $projects = (User::find(auth()->user()->id)->projects);
//        if (!$projects){ return response()->json(['message'=>'Проекты не найдены']); }
        if ($isdetail){
            return DetailProjectResource::collection($projects);
        }
        return ProjectResource::collection($projects);
    }

}
