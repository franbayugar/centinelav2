<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViaticRequest extends FormRequest
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
            'area_id'       =>  'required|numeric',
            'work_date'     =>  'date_format:"Y-m-d H:i:s"|required',
            'description'   =>  'nullable'
        ];
    }

    public function messages()
    {
        return [
            'area_id.required'      =>  'El campo área es obligatorio.',
            'area_id.numeric'       =>  'El campo área debe ser un número.',
            'work_date.required'    =>  'El campo fecha es obligatorio.',
            'work_date.date_format' =>  'El campo fecha no corresponde con el formato de fecha Y-m-d H:i:s.',
        ];
    }
}
