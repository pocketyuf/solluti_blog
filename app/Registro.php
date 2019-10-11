<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    //
    //protected $table = 'TB_Registros';
    protected $table = 'TB_RegistrosT';
    protected $primaryKey = 'reg_id';
    public $timestamps = false;

    public function login()
    {
        return $this->belongsTo('App\Login', 'reg_login');
    }
}
