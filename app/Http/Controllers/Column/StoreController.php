<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Http\Requests\Column\StoreRequest;
use App\Http\Resources\Column\ColumnResource;
use App\Models\Column;
use App\Models\Task;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {

        $data=$request->validated();
        $column = Column::create($data);

        return new ColumnResource($column);
   }
}
