<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursosRequest extends FormRequest
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
      //return [
      //  'nome'=> 'required',
      //  'cargaHoraria'=> 'required'
     // ];
    }

    public function attributes(){
     // return [
     //     'nome' => "Nome do Curso",
     //     'cargaHoraria' => "Carga Horária"
     // ];
  }
}
