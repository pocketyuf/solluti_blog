@extends('layout')
@section('content')
<div class="mainSection">

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
          <h3>Nova Postagem</h3>
          <form class="col-md-12 col-sm-12 col-xs-12 user-login-box" method="POST" action="/cadastrar/{{$id}}">
            {{method_field('PATCH')}}
            {{ csrf_field() }}
            <div class="form-group">
              <label for="assunto" class="control-label">Título da postagem</label>
              <input type="text" class="form-control" name="assunto" id="assunto" required>
            </div>
            <div class="form-group">
              <label for="postagem" class="control-label">Digite abaixo seu conteúdo</label>
              <textarea class="form-control" name="postagem" id="postagem" required></textarea>
            </div>
            @isset($erro)
              <div class="alert alert-danger">
                {{ $erro }}
              </div><br />
            @endisset
            <button id="buttonLogin" type="submit" class="user-login-button btn btn-default widthButton">Enviar</button>
          </form>

        </div>

        </div>

        </div>

      </div>
    </div>
  </div>
</div>

@endsection
