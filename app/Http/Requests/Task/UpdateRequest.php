<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'column_id'=>'integer',
            'title'=>'string',
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
