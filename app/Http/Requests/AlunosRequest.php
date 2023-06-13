<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunosRequest extends FormRequest
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
     // return [
     //   'nome'=> 'required',
    //    'cpf'=> 'required',
     //   'email'=> 'required',
     //   'telefone'=> 'required',
     //   'nascimento'=> 'required'
     // ];
    }

    public function attributes(){
      return [
          'nome' => "Nome Completo",
          'cpf' => "CPF",
          'email' => "E-mail",
          'telefone' => "Telefone",
          'nascimento' => "Data de Nascimento"
      ];
  }
}
