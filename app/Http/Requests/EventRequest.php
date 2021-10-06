<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'admission_date'    =>  'required|date_format:Y-m-d H:i:s',
            'departure_date'    =>  'nullable|date_format:Y-m-d H:i:s',
            'user_id'           =>  'required|numeric',
            'action_id'         =>  'required|numeric',
            'statusrepair_id'   =>  'required|numeric',
            'description'       =>  'required',
        ];
    }

    public function messages()
    {
        return [  
            'admission_date.required'       =>  'El campo fecha de entrada es obligatorio.',
            'admission_date.date_format'    =>  'El campo fecha de entrada no corresponde con el formato de fecha Y-m-d H:i:s.',
            'departure_date.date_format'    =>  'El campo fecha de salida no corresponde con el formato de fecha Y-m-d H:i:s.',
            'description.required'          =>  'El campo descripción es obligatorio.'
        ];
    }
}
