<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "pais";
    public $timestamps = true;

    protected $fillable = [
		'id_pais','nombre_pais'
	];
}
