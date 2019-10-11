<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Login;
use App\Registro;
use Hash;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function fetch()
    {
      return view('main', [
        'registros' => Registro::all()
      ]);
    }

     public function register()
     {
       // request()->validate([
       //    'username' => 'required|max:14',
       //    'email' => 'required|max:20',
       //    'passNew' => 'required|max:16',
       //    'passConfirm' => 'required|max:16'
       //  ]);

         $usuario = Input::get('username');
         $email = Input::get('email');
         $senha = Input::get('passNew');
         $senhaConfirmar = Input::get('passConfirm');

         if($senha != $senhaConfirmar) {
           return view('/login', [
             'sucesso' => false,
             'msg' => 'Senhas não coincidem'
           ]);
         }

         if (Login::where('lgn_usuario', '=', $usuario)->where('lgn_status', '=', 1)->exists()) {
           return view('/login', [
             'sucesso' => false,
             'msg' => 'Usuário já cadastrado'
           ]);
         }

         if (Login::where('lgn_email', '=', $email)->where('lgn_status', '=', 1)->exists()) {
           return view('/login', [
             'sucesso' => false,
             'msg' => 'E-mail já cadastrado'
           ]);
         }

         $novoLogin = new Login;
         $novoLogin->lgn_usuario = $usuario;
         $novoLogin->lgn_email = $email;
         $novoLogin->lgn_senha = Hash::make($senha);
         $novoLogin->lgn_permissao = 0;
         $novoLogin->lgn_status = 1;
         try {
            $novoLogin->save();
            return view('/login', ['sucesso' => true]);
         } catch (\Exception $e) {

         }
     }

    public function store()
    {
        $usuario = Input::get('user');
        $senha = Input::get('password');

        if (Login::where('lgn_usuario', '=', $usuario)->where('lgn_status', '=', 1)->exists()) {
          $cadastro = Login::where('lgn_usuario', '=', $usuario)->get();
          if (Hash::check($senha, $cadastro[0]->lgn_senha)) {
            return view('main', [
              'usuario' => $usuario,
              'email' => $cadastro[0]->lgn_email,
              'permissao' => $cadastro[0]->lgn_permissao,
              'idUsuario' => $cadastro[0]->lgn_id,
              'registros' => Registro::with(['login'])->orderBy('reg_id', 'desc')->get()
            ]);
          }
          $erro = "Senha inválida";
        }
        else {
          $erro = "Usuário inválido";
        }
        return view('/login', ['erro' => $erro]);
    }

    public function logout()
    {
      return redirect()->intended('/');
    }
}
