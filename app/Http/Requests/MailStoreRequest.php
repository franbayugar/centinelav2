<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailStoreRequest extends FormRequest
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
            'email'     =>  'required|email|max:191|unique:mails',
            'password'  =>  'nullable|max:191',
            'person'    =>  'nullable|max:191',
            'area_id'   =>  'required|numeric'
        ];
    }

    public function messages()
    {
        return [  
            'email.required'    =>  'El campo correo es obligatorio.',
            'email.max'         =>  'El campo correo no debe contener más de 191 caracteres.',
            'email.unique'      =>  'El valor del campo correo ya está en uso.',
            'password.max'      =>  'El campo contraseña no debe contener más de 191 caracteres.',
            'person.max'        =>  'El campo persona no debe contener más de 191 caracteres.',
            'area_id.required'  =>  'El campo área es obligatorio.'
        ];
    }
}
