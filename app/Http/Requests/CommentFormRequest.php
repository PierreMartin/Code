<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentFormRequest extends Request
{

    public function messages()
    {
        return [
            'in'                => 'Ce champs dois etre du type: :values',
            'required'          => 'Ce champs :attribute est obligatoire',
            'max'               => 'Le titre ne dois pas dépasser 255 caractere',
            'email'             => 'Ce champ :attribute doit être un email'
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
        $input = $this->all();
        $input['message'] = filter_var($input['message'], FILTER_SANITIZE_STRING);
        $this->replace($input);

        return [
            'email'         => 'required|email',
            'message'       => 'required'
        ];
    }


}
