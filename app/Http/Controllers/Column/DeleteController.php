<?php

namespace App\Http\Controllers\Column;

use App\Http\Controllers\Controller;
use App\Models\Column;
use App\Models\Task;

class DeleteController extends Controller
{
    public function __invoke(Column $column)
    {
        $column->delete();
        return response(200);
    }
}
