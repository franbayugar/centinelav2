<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallStoreRequest extends FormRequest
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
            'emitter_name' => 'required',
            'date' => 'nullable|date_format:Y-m-d H:i:s',
            'call_description' => 'required',
            'area_id' => 'required|numeric',
            'notified' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'emitter_name.required' => 'El campo Nombre es obligatorio.',
            'area_id.required' => 'Debe seleccionar un Área',
            'call_description.required' =>
                'El campo descripción es obligatorio.',
        ];
    }
}
