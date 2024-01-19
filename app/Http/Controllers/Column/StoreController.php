<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Http\Requests\Column\StoreRequest;
use App\Http\Resources\Column\ColumnResource;
use App\Models\Column;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {

        $data=$request->validated();

        $data['sorting'] = (Column::where('project_id', $data['project_id'])->max('sorting'))+1;

        $column = Column::create($data);
        $column = $column->fresh();
        return new ColumnResource($column);
   }
}
