<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = ['id','titulo','descricao','visualizacoes','user_id','status','data_expiracao','empresa_id','data_publicacao','tipo'];
}
