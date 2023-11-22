<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Http\Requests\Column\UpdateRequest;
use App\Http\Resources\Column\TaskResource;
use App\Models\Task;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $column)
    {
        $column = Task::find($column);
        $data = $request->validated();
        $column->update($data);
        return new ColumnResource($column);
    }
}
