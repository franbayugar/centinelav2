<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class MachineRequest extends FormRequest
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
            'name'              =>  'required|max:191',
            'serial'            =>  'nullable|max:191',
            'password'          =>  'nullable|max:255',
            'date_purchased'    =>  'nullable|date_format:Y/m/d',
            'description'       =>  'required',
            'user_id'           =>  'required|numeric',
            'machinetype_id'    =>  'required|numeric',
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png|max:255',
                Rule::dimensions()->maxWidth(300)->maxHeight(300),
            ]
        ];
    }

    public function messages()
    {
        return [  
            'name.required'                 =>  'El campo nombre es obligatorio.',
            'name.max'                      =>  'El campo nombre no debe contener más de 191 caracteres.',
            'password.max'                  =>  'El campo contraseña no debe contener más de 255 caracteres.',
            'date_purchased.date_format'    =>  'El campo fecha de compra no corresponde con el formato de fecha Y/m/d',
            'description.required'          =>  'El campo descripción es obligatorio.',
            'image.dimensions'      =>  'El campo imagen tiene dimensiones inválidas. La imagen debe ser de 300x300px',
        ];
    }
}
