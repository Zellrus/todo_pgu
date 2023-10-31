<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowProject extends Controller
{
    public function __invoke()
    {
        $projects = User::find(auth()->user()->id)->projects;
        //  dd($projects);
         return response($projects);
        // return response(200);
    }
}
