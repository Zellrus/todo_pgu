<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded=false;
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function column(){
        return $this->belongsTo(Column::class,'column_id','id');
    }
}
