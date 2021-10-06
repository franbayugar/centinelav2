<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class RouterUpdateRequest extends FormRequest
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
                Rule::unique('routers', 'name')->ignore($this->segment(3)), // segment(3) devuelve el 3er parametro pasado en la url, en este caso router_id
            ],
            'password'      =>  'nullable|max:191',
            'description'   =>  'nullable',
            'area_id'       =>  'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         =>  'El campo nombre es obligatorio.',
            'name.max'              =>  'El campo nombre no debe contener más de 191 caracteres.',
            'name.unique'           =>  'El valor del campo nombre ya está en uso.',
            'area_id.required'      =>  'El campo área es obligatorio.',
            'area_id.numeric'       =>  'El campo área debe ser un número.',
        ];
    }
}
