<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteBanco extends Model
{
     protected $table = "cliente_bancos";
    public $timestamps = true;
    protected $primaryKey = 'id_cliente_banco';

    protected $fillable = [
		'id_cliente_banco','codigo_banco','cedula_cliente','num_cuenta',
	];
}
