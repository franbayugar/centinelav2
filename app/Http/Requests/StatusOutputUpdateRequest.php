<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StatusOutputUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'max:191',
                Rule::unique('statusoutputs', 'name')->ignore($this->segment(4)), // segment(3) devuelve el 3er parametro pasado en la url, en este caso router_id
            ],
            'color' => 'required|max:191'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     =>  'El campo nombre es obligatorio.',
            'name.max'          =>  'El campo nombre no debe contener más de 191 caracteres.',
            'name.unique'       =>  'El valor del campo nombre ya está en uso.',
            'color.required'    =>  'El campo color es obligatorio.',
            'color.max'         =>  'El campo color no debe contener más de 191 caracteres.'
        ];
    }
}
