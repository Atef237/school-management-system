<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class classroomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|unique:classrooms,name',
            'name_en' => 'required|unique:classrooms,name',
            'Grade_id' => 'required|exists:grades,id',
            'school_year_id' => 'required|exists:school_years,id',
            'status' => 'in:0,1'
        ];
    }
}
