<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //
    //protected $table = 'TB_Login';
    protected $table = 'TB_LoginT';
    protected $primaryKey = 'lgn_id';
    public $timestamps = false;

    public function registro()
    {
        return $this->hasMany('App\Registro', 'reg_login');
    }
}
