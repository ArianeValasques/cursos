@extends('layouts.app')
@section('htmlheader_titulo', 'Cursos')

@section('conteudo')
<div class = "aside" id="menu" style="width:100%; height:100px;  padding-left: 20px">
    <a href="?pagina=/"><img src="img\logo.png" title="Logo" alt="Logo"></a>
    <a href="/Matricula" style="float:right;  padding-left: 15px; padding-right: 15px">Matrículas</a>
    <a href="/Aluno" style="float:right;  padding-left: 15px; padding-right: 15px">Alunos</a>
    <a href="/Curso" style="float:right;  padding-left: 15px; padding-right: 15px">Cursos</a>
</div>
<div class="card"> 
    <div class="card-body"> 
        <h1>API REST PHP</h1>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
    </div>
</div>
@endsection
