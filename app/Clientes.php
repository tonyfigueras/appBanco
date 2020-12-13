<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "clientes";
    public $timestamps = true;
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
		'id_cliente','cedula','nombres','apellidos','correo','direccion','telefono',
	];
}
