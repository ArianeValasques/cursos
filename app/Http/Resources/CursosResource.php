<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CursosResource extends JsonResource
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
        //    'cargaHoraria' = $this->cargaHoraria;
        //]
        return $this->resource->toArray();
    }

    public function with($request)
    {
    	return ['extra-single-data' => 'Retornar nesta chamada...'];
    }
}
