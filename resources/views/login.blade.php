@extends('layout')
@section('content')
<div class="container main-section">
  <div class="row">
    <div class="col-md-4 col-sm-8 col-xs-12 col-md-offset-4 col-sm-offset-2 login-image-main text-center">
      <div class="row nav nav-tabs tab tab-content">

        <div id="loginTab" class="tab-pane active">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <img src="../img/logotipo-original.png" style="max-height: 120px;">
          </div>
          <form class="col-md-12 col-sm-12 col-xs-12 user-login-box" method="POST" action="/login">
            {{method_field('PATCH')}}
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Digite seu usuário" name="user" id="user" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Palavra-chave" name="password" id="password" required>
            </div>
            @isset($erro)
              <div class="alert alert-danger">
                {{ $erro }}
              </div><br />
            @endisset
            <button id="buttonLogin" type="submit" class="user-login-button btn btn-default widthButton">Avançar</button>
          </form>
          <div class="col-md-12 col-sm-12 col-xs-12 last-part">
            <p>Não tem uma conta?<a id="changeToRegisterTab" data-toggle="tab" href="#registerTab"> Crie uma!</a></p>
          </div>
        </div>

        <div id="registerTab" class="tab-pane">
          <h3 class="col-md-12 col-sm-12 col-xs-12">
            <p style="color:#666">Cadastro de usuário</p>
          </h3>
          <form id="cadastro" class="col-md-12 col-sm-12 col-xs-12 user-login-box" method="POST" action="/register">
            {{method_field('PATCH')}}
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Digite seu nome de usuário" name="username" id="username" required pattern=".{4,14}">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Digite seu e-mail" name="email" id="email" required pattern=".{5,30}">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Nova senha" name="passNew" id="passNew" required pattern=".{6,12}">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Repetir senha" name="passConfirm" id="passConfirm" required pattern=".{6,12}">
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div><br />
            @endif
            <a class="btn btn-default pull-left" data-toggle="tab" href="#loginTab" style="margin: 10px">Voltar</a>
            <button id="buttonSignup" type="submit" class="btn btn-default pull-right" style="margin: 10px">Avançar</button>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

@isset($sucesso)
  @if ($sucesso == true)
     <script>
     spop({
       autoclose: 2500,
       template: 'Conta de usuário cadastrada!',
       position  : 'bottom-right',
       style: 'success'
      });
     </script>
  @endif
  @if ($sucesso == false)
    <script>
    $('#changeToRegisterTab').click();
    spop({
      autoclose: 2500,
      template: '{{$msg}}',
      position  : 'bottom-right',
      style: 'error'
     });
    </script>
  @endif
@endisset

@endsection
