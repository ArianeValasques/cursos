<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['nome, cpf, email, telefone, nascimento, latitude, longitude'];
}
