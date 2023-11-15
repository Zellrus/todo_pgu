<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $task)
    {
        $task = Task::find($task);
        $data = $request->validated();
        $task->update($data);
        return new TaskResource($task);
    }
}
