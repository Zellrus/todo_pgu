<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;
    public function task(){
        return $this->hasMany(Task::class,'column_id','id');
    }
    public function projects(){
        return $this->belongsToMany(Project::class, "column_projects","column_id","project_id");
    }
}
