<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlunosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
	    //return [
        //    'nome' = $this->nome;
        //    'cpf' = $this->cpf;
        //    'email' = $this->email;
        //    'telefone' = $this->telefone;
        //    'nascimento' = $this->nascimento;
        //]
        return $this->resource->toArray();
    }

    public function with($request)
    {
    	return ['extra-single-data' => 'Retornar nesta chamada...'];
    }
}
