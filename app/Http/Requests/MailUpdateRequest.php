<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class MailUpdateRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::unique('mails', 'email')->ignore($this->segment(3)), // segment(3) devuelve el 3er parametro pasado en la url, en este caso mail_id
            ],
            'password'  =>  'nullable|max:191',
            'person'    =>  'nullable|max:191',
            'area_id'   =>  'required|numeric'
        ];
    }
}
