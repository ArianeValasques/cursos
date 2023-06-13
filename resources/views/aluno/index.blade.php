@extends('layouts.app')
@section('htmlheader_titulo', 'Alunos')
@section('links_adicionais')
  <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
@endsection
@section('scripts_adicionais')
  <script src="{{asset('plugins\AdminLTE-3.2.0-rc\plugins\datatables\datatables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/list_aluno.js') }}"></script>
@endsection
@section('conteudo')
<div class = "aside" id="menu" style="width:100%; height:100px">
    <a href="?pagina=/"><img src="img\logo.png" title="Logo" alt="Logo" style="padding-left: 15px"></a>
    <a href="/" style="float:right;  padding-left: 15px; padding-right: 15px">Sair</a>
    <a href="/Matricula" style="float:right;  padding-left: 15px; padding-right: 15px">Matrículas</a>
    <a href="/Aluno" style="float:right;  padding-left: 15px; padding-right: 15px">Alunos</a>
    <a href="/Curso" style="float:right;  padding-left: 15px; padding-right: 15px">Cursos</a>
</div>
<div class="card"> 
<div class="card-body"> 
      @if(Session::has('mensagem'))
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">x</button>
          {{Session::get('mensagem')}}
        </div>
      @endif
      <div class="container"> 
          <h2>Gerenciar Alunos</h2><br> 
          <a href="/Aluno/create" class='btn btn-outline-info col-2'>
          <b>Cadastro de Aluno</b></a><br><br><br> 
        <table id="alunos" class="table table-bordered table-hover"> 
          <thead> 
            <tr> 
            <th>ID</th> 
              <th>Nome</th> 
              <th>CPF</th> 
              <th>E-mail</th>
              <th>Telefone</th> 
              <th>Data de Nascimento</th> 
              <th>Ação</th> 
            </tr> 
          </thead> 
          <tbody>
          </tbody> 
        </table> 
      </div> 
    </div> 
  </div>
@endsection