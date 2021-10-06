<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'name'          =>  'required|max:191|unique:products',
            'image' => [
                'nullable',
                'mimes:jpeg,jpg,png|max:255',
                Rule::dimensions()->maxWidth(300)->maxHeight(300),
            ],
            'description'   =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         =>  'El campo nombre es obligatorio.',
            'name.max'              =>  'El campo nombre no debe contener más de 191 caracteres.',
            'name.unique'           =>  'El valor del campo nombre ya está en uso.',
            'image.mimes'           =>  'El campo imagen debe ser un archivo de tipo jpeg, jpg, png.',
            'image.dimensions'      =>  'El campo imagen tiene dimensiones inválidas. La imagen debe ser de 300x300px',
            'description.required'  =>  'El campo descripción es obligatorio.'
        ];
    }
}
