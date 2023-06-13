@extends('layouts.app')
@section('htmlheader_titulo', 'Cadastrar Matrícula')
@section('scripts_adicionais')
  <script src="{{asset('plugins\AdminLTE-3.2.0-rc\plugins\datatables\datatables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/list_aluno.js')}}"></script>
  <script type="text/javascript" src="{{ asset('js/list_curso.js')}}"></script>
@endsection
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
          <h2>  Cadastro de Matrícula </h2>
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
      <form action='/Matricula' id="cadMatricula" method='POST'>
        @csrf 
        <hr>
        <div class="form-row"> 
          <div class="form-group col-md-5 col-sm-3" id="divAlunos">
            <strong>Aluno</strong>
            <select id="fk_aluno" name='fk_aluno' class="select2 form-control  @error('aluno') is-invalid @enderror">
                <option value="" {{ (old("fk_aluno") == "" ? "selected":"") }}>Selecione</option>
                @foreach($alunos as $aluno)
                <option value='{{$aluno->id}}'{{ (old("aluno") == $aluno->id ? "selected":"") }}>{{$aluno->nome}}</option>
                @endforeach
            </select>
            @error('fk_aluno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-5 col-sm-3" id="divCursos">
            <strong>Curso</strong>
            <select id="curso" name='fk_curso' class="select2 form-control  @error('curso') is-invalid @enderror">
                <option value="" {{ (old("fk_curso") == "" ? "selected":"") }}>Selecione</option>
                @foreach($cursos as $curso)
                <option value='{{$curso->id}}'{{ (old("fk_curso") == $curso->id ? "selected":"") }}>{{$curso->nome}}</option>
                @endforeach
            </select>
            @error('fk_curso')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div> 
            <button type="submit" form="cadMatricula" class="btn btn-info float-right" style="margin:32px 0 0 50px;">Enviar</button>
          </div>
        </div>
      </form>
    </div> 
  </div> 
</div>
@endsection