<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatriculasResource extends JsonResource
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
        //    'fk_aluno' = $this->fk_aluno;
        //    'fk_curso' = $this->fk_curso;
        //]
        return $this->resource->toArray();
    }

    public function with($request)
    {
    	return ['extra-single-data' => 'Retornar nesta chamada...'];
    }
}
