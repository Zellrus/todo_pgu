<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $guarded = false;
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
//    public function task(){
//        return $this->belongsTo(Task::class);
//    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
