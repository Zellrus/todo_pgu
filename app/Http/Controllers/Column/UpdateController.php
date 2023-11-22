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
        $column->update($data);
        return new ColumnResource($column);
    }
}
