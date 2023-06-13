@extends('layouts.app')
@section('htmlheader_titulo', 'Cadastrar Curso')
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
              <h2>  Cadastro de Curso </h2>
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
          <form action='/Curso' id="cadCurso" method='POST'>
            @csrf
            <div class="form-row">
              <div class="form-group col-3">
                <label>Nome</label><br>
                <input type="text" name='nome' class="form-control 
                @error('nome') is-invalid @enderror" value="{{ old('nome') }}" ><br>
                @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-2">
              <label>Carga Horária</label><br>
                <input type="text" name='cargaHoraria' class="form-control @error('cargaHoraria') is-invalid @enderror" value="{{ old('cargaHoraria') }}"><br>
                @error('cargaHoraria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
              </div>
              <div> 
                <button type="submit" form="cadCurso" class="btn btn-info float-right" style="margin:32px 0 0 50px;">Enviar</button>
              </div>
            </div>      
          </form>
        </div>
      </div>
  </div>
@endsection
