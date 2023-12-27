<?php

namespace App\Http\Requests\Column;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'project_id'=>'required|integer',
            'sorting'=>'integer|required',
            'title'=>'required|string',
//            'description'=>'string',
            'color'=>'string',
//            'deadline'=>'date'
        ];
    }
}
