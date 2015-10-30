<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostFormRequest extends Request
{

    public function messages()
    {
        return [
            'in'                => 'Ce champs dois etre du type: :values',
            'required'          => 'Ce champs :attribute est obligatoire',
            'max'               => 'Le titre ne dois pas dépasser 255 caractere',
            'size'              => 'image de taille trop grosse !',
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
            'title'         => 'required|max:255',
            'image'         => 'required|mimes:jpg,png,gif,jpeg',
            'content'       => 'required',
            'category_id'   => 'required',
            'tags'          => 'required',
        ];
    }
}
