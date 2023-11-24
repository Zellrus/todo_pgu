<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Resources\Task\TaskResource;
use App\Models\Column;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;


class ShowController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();

        if (isset($data['project_id'])){
           return $this->byProject_Id($data['project_id']);
        }
        elseif (isset($data['column_id'])){
            return $this->byColumnId($data['column_id']);
        }
        elseif (isset($data['task_id'])){
            return $this->byTaskId($data['task_id']);
        }
        else{
            return response()->json(['message'=>'Нет ни одного параметра (project_id, column_id или task_id)']);
        }

    }
    private function byProject_Id($id){
        $project = Project::find($id);
        if (!$project){ return response()->json(['message'=>'Проект не найден']); }

        if(!$project->columns->all()){ return response()->json(['message'=>'Колонки проекта не найдены'] );}

        foreach ($project->columns->all() as $column){
            $tasks[] = $column->tasks;
        }
        return TaskResource::collection($tasks[0]);
    }
    private function byColumnId($id){
        $column=Column::find($id);
        if(!$column){ return response()->json(['message'=>'Колонка не найдена'] );}
        return TaskResource::collection($column->tasks);
    }
    private function byTaskId($id){
        $task=Task::find($id);
        if(!$task){ return response()->json(['message'=>'Задача не найдена'] );}
        return new TaskResource($task);
    }
}
