@extends('layouts.app')
@section('htmlheader_titulo', 'Editar Aluno')
@section('scripts_adicionais')
  <script type="text/javascript" src=" {{asset('plugins/maskedinput/jquery.maskedinput.min.js')}}"></script>
  <script  type="text/javascript" >
    $(document).ready( function($){
        $("#cpf").mask("999.999.999-99");
    }); 
    $(document).ready( function($){
        $("#telefone").mask("99-99999-9999");
    });    
  </script>
  <script type="text/javascript">
    if ('geolocation' in navigator){
      navigator.geolocation.getCurrentPosition(function(position){
      var lat=position.coords.latitude;
      var lon=position.coords.longitude;
      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lon;
      console.log(position)
    });
    }else{alert="Não foi possível acessar a localização";}
  </script>
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
        <hr>
        <form action="/Aluno/{{$aluno->id}}" id="alterAluno" method="POST">
          @csrf
          @method('PUT')
          <div class="form-row">
            <div class="form-group col-3">
              <label>Nome</label><br>
              <input type="text" name='nome' value="{{$aluno->nome}}" class="form-control 
                @error('nome') is-invalid @enderror" value="{{ old('nome') }}" ><br>
                @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-2">
              <label>CPF</label><br>
              <input type="text" id='cpf' name='cpf' value="{{$aluno->cpf}}" class="form-control  @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}"><br>
                @error('cpf')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
              </div>
            <div class="form-group col-2">
              <label>Telefone</label><br>
              <input type="text" id='telefone' name='telefone' value="{{$aluno->telefone}}" class="form-control @error('telefone') is-invalid @enderror" value="{{ old('telefone') }}"><br>
                @error('telefone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-2">
              <label>Nascimento</label><br>
                <input type="date" name='nascimento' value="{{$aluno->nascimento}}" class="form-control @error('nascimento') is-invalid @enderror" value="{{ old('nascimento') }}"><br>
                  @error('nascimento')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                      </span>
                  @enderror
            </div>
            <div class="form-group col-2">
              <label>email</label><br>
                <input type="text" name='email' value="{{$aluno->email}}" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"><br>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                      </span>
                  @enderror
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-2">
              <label>Latitude</label><br>
                <input type="text" name='latitude' value="{{$aluno->latitude}}" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}"><br>
                  @error('latitude')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                      </span>
                  @enderror
            </div>
            <div class="form-group col-2">
              <label>Longitude</label><br>
                <input type="text" name='longitude' value="{{$aluno->longitude}}" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude') }}"><br>
                  @error('longitude')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{$message}}</strong>
                      </span>
                  @enderror
            </div>
          </div>
          <div class="form-row">
            <div> 
                <button type="submit" form="alterAluno" class="btn btn-info float-right" style="margin:0px 0 0 10px;">Enviar</button>
            </div>
          </div>
        </form>
      </div>    
    </div>
  </div>
@endsection
