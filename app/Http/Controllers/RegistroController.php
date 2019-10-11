<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Login;
use App\Registro;

class RegistroController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

     public function postagem($id)
     {
       return view('postagem', [
         'id' => $id
       ]);
     }

     public function store($id)
    {
      $assunto = Input::get('assunto');
      $postagem = Input::get('postagem');

      $novoRegistro = new Registro;
      $novoRegistro->reg_data = date("Y-m-d H:i:s", strtotime("-3 hour")); //diferença de horário do servidor
      $novoRegistro->reg_login = $id;
      $novoRegistro->reg_assunto = utf8_decode($assunto);
      $novoRegistro->reg_postagem = utf8_decode($postagem);
      $novoRegistro->save();

      $cadastro = Login::where('lgn_id', '=', $id)->get();
      return view('main', [
        'usuario' => $cadastro[0]->lgn_usuario,
        'email' => $cadastro[0]->lgn_email,
        'permissao' => $cadastro[0]->lgn_permissao,
        'idUsuario' => $cadastro[0]->lgn_id,
        'registros' => Registro::with(['login'])->orderBy('reg_id', 'desc')->get()
      ]);
    }

    public function delete($id, $reg)
   {
     Registro::where('reg_id', $reg)->delete();

     $cadastro = Login::where('lgn_id', '=', $id)->get();
     return view('main', [
       'usuario' => $cadastro[0]->lgn_usuario,
       'email' => $cadastro[0]->lgn_email,
       'permissao' => $cadastro[0]->lgn_permissao,
       'idUsuario' => $cadastro[0]->lgn_id,
       'registros' => Registro::with(['login'])->orderBy('reg_id', 'desc')->get()
     ]);
   }

}
