<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = ['fk_aluno, fk_curso'];

    public function matricula_aluno()
    {
        $aluno = Aluno::select("nome")->where("id",$this->fk_aluno)->get();
        $nome = json_decode($aluno[0], true);
      
        return $nome['nome']; 
    }

    public function matricula_curso()
    {
        $curso = Curso::select("nome")->where("id",$this->fk_curso)->get();
        $nome = json_decode($curso[0], true);
      
        return $nome['nome']; 
    }
    
}
