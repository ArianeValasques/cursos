@extends('layouts.app')
@section('htmlheader_titulo', 'Editar Curso')
@section('conteudo')
<div class = "aside" id="menu" style="width:100%; height:100px">
    <a href="?pagina=/"><img src="img\logo.png" title="Logo" alt="Home" style="padding-left: 15px"></a>
    <a href="/" style="float:right;  padding-left: 15px; padding-right: 15px">Sair</a>
    <a href="/Matricula" style="float:right;  padding-left: 15px; padding-right: 15px">Matrículas</a>
    <a href="/Aluno" style="float:right;  padding-left: 15px; padding-right: 15px">Alunos</a>
    <a href="/Curso" style="float:right;  padding-left: 15px; padding-right: 15px">Cursos</a>
</div>
  <div class="card">
    <div class="card-body">
      <div class="container">
        <section class="content-header">
          <div class="col-sm-12">
            <h2>Alteração de Cadastro </h2>
          </div>
        </section>
        @if(Session::has('mensagem')) 
            <div class="alert alert-danger alert-dismissible">
                <!-- data-dismiss - clas para fechar o button que abrir sem precisar de nada  -->
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h5><i class="icon fas fa-ban"></i>Atenção!</h5>
                {{Session::get('mensagem')}}
            </div>
        @endif
        <form action="/Curso/{{$curso->id}}" id="alterCurso" method="POST">
          @csrf
          @method('PUT')
          <div class="form-row">
            <div class="form-group col-3">
              <label>Nome</label><br>
              <input type="text" name='nome' value="{{$curso->nome}}" class="form-control 
                @error('nome') is-invalid @enderror" value="{{ old('nome') }}" ><br>
                @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-2">
              <label>Carga Horária</label><br>
                <input type="text" name='cargaHoraria' value="{{$curso->cargaHoraria}}" class="form-control @error('cargaHoraria') is-invalid @enderror" value="{{ old('cargaHoraria') }}"><br>
                  @error('cargaHoraria')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                      </span>
                  @enderror
            </div>
            <div> 
                <button type="submit" form="alterCurso" class="btn btn-info float-right" style="margin:32px 0 0 50px;">Enviar</button>
            </div>
          </div>
        </form>
      </div>    
    </div>
  </div>
@endsection