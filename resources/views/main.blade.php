@extends('layout')
@section('content')
<div class="mainSection">

  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <p class="navbar-brand" style="color:white">Solluti Blog</p>
        </div>
        <ul class="nav navbar-nav pull-right" style="display:inline-block">
          @isset($usuario)
            <a class="last-part" href="/postagem/{{$idUsuario}}"><i class="fas fa-sticky-note"></i> Nova postagem</a>
            <a class="last-part" href="/logout"><i class="fas fa-user" style="margin-left: 15px"></i> {{$usuario}} (desconectar)</a>
          @endisset
          @empty($usuario)
            <a class="last-part" href="/signin"><i class="fas fa-user"></i> Login</a>
          @endempty
        </ul>
      </div>
    </nav>

  <div class="container main-section">
    <div class="row">
      <div class="col-md-12 text-center user-login-header">
        <img id="imgTitle" src="/img/logotipo-original.png" style="margin: 10px"/>
      </div>
    </div>
    <div class="text-center">

      <div id="cadastro" class="form-control customForm">

        <div class="tab-content">

              <div id="checklistTab" class="tab-pane active">

                @foreach($registros as $registro)
                 <legend>{{ utf8_encode($registro->reg_assunto) }}

                   @isset($idUsuario)
                   @if($idUsuario == $registro->reg_login)
                     <a class="float-right" href="/delete/{{$idUsuario}}/{{$registro->reg_id}}"><i class="fas fa-trash"></i></a>
                   @endif
                   @endisset

                 </legend>
                 <hr />
                 <div class="form-group customDiv" style="white-space: pre-line; padding: 0px 25px 0px 25px;">
                  <p>
                    {{ utf8_encode($registro->reg_postagem) }}
                  </p>
                  <p class="float-right"><i>Postado por {{$registro->login->lgn_usuario}} em {{$registro->reg_data}}</i></p>
                 </div>
                 <hr />
                @endforeach

              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
