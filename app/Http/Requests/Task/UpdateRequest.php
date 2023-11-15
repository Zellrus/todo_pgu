<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
//            'project_id'=>'required|integer',
            'name'=>'string',
            'description'=>'string',
            'color'=>'string',
            'deadline'=>'date'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
