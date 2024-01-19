<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Http\Requests\Column\UpdateRequest;
use App\Http\Resources\Column\ColumnResource;
use App\Models\Column;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $column)
    {
        $column = Column::find($column);
        $data = $request->validated();

        $maxSorting = (Column::where('project_id', $column->project_id)->max('sorting'))+1;
        if (isset($data['sorting'])){
            if ($data['sorting'] < $maxSorting) {
                //обновляем столбец sorting
                Column::where('project_id', $column->project_id)
                    ->where('sorting', '>=', $data['sorting'])
                    ->increment('sorting');
            }
        }
        $column->update($data);
        return new ColumnResource($column);
    }
}
