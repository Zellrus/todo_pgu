<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;
    public function project(){
        return $this->hasOne(Projects::class,'project_id','id');
    }
}
