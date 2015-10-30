<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactFormRequest extends Request
{
    public function messages()
    {
        return [
            'in'                => 'Ce champs dois etre du type: :values',
            'required'          => 'Ce champs :attribute est obligatoire',
            'max'               => 'L\' :attribute ne dois pas dépasser 255 caractere',
            'email'             => 'Ce champ doit être un email',
        ];
    }

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
            'email'         => 'required|email',
            'message'       => 'required',
            'category_id'   => 'required|integer',
        ];
    }
}
