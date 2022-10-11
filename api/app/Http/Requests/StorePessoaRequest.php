<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePessoaRequest extends FormRequest
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
            "nome" => "required|min:3|max:100",
            "cpf" => "required|min:11|max:14",
            "email" => "required|max:100",
            "dtNasc" => "required",
            "isUsuario" => "required",
        ];
    }
}
