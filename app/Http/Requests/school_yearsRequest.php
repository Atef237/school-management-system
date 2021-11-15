<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class school_yearsRequest extends FormRequest
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
            'List_Classes.*.name' => 'required|max:100|unique:school_years,name',
        ];
    }

    public function messages()
    {
        return [

           'name.required' => trans('Messages.required'),
           'name_en.required' => trans('Messages.required'),
           'name.unique' => trans('Messages.unique'),
           'name_en.unique' => trans('Messages.unique'),

        ];
    }
}
