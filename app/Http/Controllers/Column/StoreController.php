<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Http\Requests\Column\StoreRequest;
use App\Models\Column;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
        $data=$request->validated();
        $column = Column::create($data);
        return $column;
   }
}
