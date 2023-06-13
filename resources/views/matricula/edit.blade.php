@extends('layouts.app')
@section('htmlheader_titulo', 'Editar Matrícula')
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
            <h2>Alteração de Matrícula </h2>
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
        <form action="/Matricula/{{$matricula->id}}" id="alterMatricula" method="POST">
          @csrf
          @method('PUT')
          <div class="form-row">
            <div class="form-group col-md-5" id="divAlunos">
                <strong>Aluno<span style="color: red;">*</span></strong>
                <select id="fk_aluno" name='fk_aluno' class="select2 form-control  @error('fk_aluno') is-invalid @enderror" >
                    <option value="">Selecione</option>
                    @foreach($alunos as $aluno)
                        <option value='{{$aluno->id}}' {{ ($matricula->fk_aluno == $aluno->id ? "selected":"") }}>{{$aluno->nome}}</option>                                        
                    @endforeach
                </select>
                @error('fk_aluno')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-5" id="divCursos">
                <strong>Curso<span style="color: red;">*</span></strong>
                <select id="fk_curso" name='fk_curso' class="select2 form-control  @error('fk_curso') is-invalid @enderror" >
                    <option value="">Selecione</option>
                    @foreach($cursos as $curso)
                        <option value='{{$curso->id}}' {{ ($matricula->fk_curso == $curso->id ? "selected":"") }}>{{$curso->nome}}</option>                                        
                    @endforeach
                </select>
                @error('fk_curso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div> 
                <button type="submit" form="alterMatricula" class="btn btn-info float-right" style="margin:32px 0 0 50px;">Enviar</button>
            </div>
          </div>
        </form>
      </div>    
    </div>
  </div>
@endsection