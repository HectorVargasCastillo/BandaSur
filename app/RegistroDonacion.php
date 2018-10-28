<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroDonacion extends Model
{
    //
     protected $table = 'registro_donacion';

     public function evento()
	 {
   		 return $this->belongsTo(Evento::class);
	 }

	 public function users()
	 {
   		 return $this->belongsTo(Users::class);
	 }

	 
}
