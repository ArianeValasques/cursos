@extends('layouts.app')
@section('htmlheader_titulo', 'Cursos')

@section('conteudo')
<div class = "aside" id="menu" style="width:100%; height:100px">
        <a href="?pagina=/"><img src="img\logo.png" title="Logo" alt="Logo"></a>
</div>
<div class="card"> 
    <div class="card-body"> 
        <h1>API REST LARAVEL</h1>
        <a> Usuário: admin@admin.com / Senha: admin </a>
        <div class="container">
          <section class="content-header">
            <div class="col-sm-12">
              <label>Faça o login para iniciar a sua sessão </label>
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
          <form action='/' id="login" method='POST'>
            @csrf
            <div class="form-group">
                <div class="form-group col-3">
                    <label>Usuário</label></br>
                    <input type="text" name='usuario' placeholder="admin@admin.com" class="form-control 
                    @error('usuario') is-invalid @enderror" value="{{ old('usuario') }}" >
                    @error('usuario')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-3">
                    <label>Senha</label></br>
                    <input type="text" name='senha' placeholder="admin" class="form-control  @error('senha') is-invalid @enderror" value="{{ old('senha') }}">
                    @error('senha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div> 
                    <button type="submit" form="login" class="btn btn-info float-left" style="margin:0px 0 0 10px;" >Login</button>
                </div>
            </div>      
          </form>
        </div>
    </div>
</div>
@endsection
