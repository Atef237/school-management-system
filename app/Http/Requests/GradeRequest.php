<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GradeRequest extends FormRequest
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

            'name'=> 'required|max:100|unique:grades,name->ar,'.$this->id,
            'name_en'=> 'required|max:100|unique:grades,name->en,'.$this->id,

        ];
    }


    public function messages()
    {
        return [
            'name.required'=> trans('Messages.required'),
            'name_en.required'=> trans('Messages.required'),
            'name.unique' => trans('Messages.unique'),
            'name_en.unique' => trans('Messages.unique'),
        ];
    }
}
