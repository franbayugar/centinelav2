<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'      =>  'required|max:80',
            'lastname'  =>  'required|max:80',
            'email'     =>  'required|email|max:191|unique:users',
            'password'  =>  'required|min:6',
            'type'      =>  'required',
            'area_id'   =>  'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     =>  'El campo nombre es obligatorio.',
            'name.max'          =>  'El campo nombre no debe contener más de 80 caracteres.',
            'lastname.required' =>  'El campo apellido es obligatorio.',
            'lastname.max'      =>  'El campo apellido no debe contener más de 80 caracteres.',
            'password.required' =>  'El campo contraseña es obligatorio.',
            'type.required'     =>  'El campo tipo es obligatorio.',
            'area_id.required'  =>  'El campo área es obligatorio.',
            'area_id.numeric'   =>  'El campo área debe ser un número.'
        ];
    }
}
