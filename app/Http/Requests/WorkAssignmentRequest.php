<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkAssignmentRequest extends FormRequest
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
            'name'              =>  'required|max:30',
            'start_date'        =>  'required|date_format:Y-m-d H:i:s',
            'finish_date'       =>  'nullable|date_format:Y-m-d H:i:s',
            'working_state_id'  =>  'required|numeric',
            'user_id'           =>  'nullable|numeric',
            'description'       =>  'required'
        ];
    }

    public function messages()
    {
        return [  
            'name.required'                     =>  'El campo descripción corta es obligatorio.',
            'name.max'                          =>  'El campo descripción corta no debe contener más de 30 caracteres.',
            'start_date.required'               =>  'El campo fecha inicio es obligatorio.',
            'start_date.date_format'            =>  'El campo fecha inicio no corresponde con el formato de fecha Y-m-d H:i:s.',
            'finish_date.date_format'           =>  'El campo fecha finalización no corresponde con el formato de fecha Y-m-d H:i:s.',
            'working_state_id.required'         =>  'El campo estado es obligatorio.',
            'working_state_id.numeric'          =>  'El campo estado debe ser un número.',
            'user_id.numeric'                   =>  'El campo asignada debe ser un número.'
        ];
    }
}
