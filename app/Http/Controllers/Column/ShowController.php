<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Http\Resources\Column\ColumnResource;

use App\Http\Resources\Task\TaskResource;
use App\Models\Column;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;


class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        if (isset($data['project_id'])){
            return $this->byProjectId($data['project_id']);
        }
        elseif (isset($data['column_id'])){
            return $this->byColumnId($data['column_id']);
        }
        else{
            return response()->json(['message'=>'Нет ни одного параметра (project_id или column_id)']);
        }
    }
    private function byProjectId($id){
        $project=Project::find($id);
        if (!$project){ return response()->json(['message'=>'Проект не найден']); }
        return ColumnResource::collection($project->columns);
    }
    private function byColumnId($id){
        $column = Column::find($id);
        if(!$column){ return response()->json(['message'=>'Колонка не найдена'] );}
        return new ColumnResource($column);
    }

}
