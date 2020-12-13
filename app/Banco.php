<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = "banco";
    public $timestamps = true;
    protected $primaryKey = 'id_banco';

    protected $fillable = [
		'id_pais_banco','codigo_banco','nombre_banco','id_banco',
	];
}
