<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroPropuesta extends Model
{
    //
     protected $table = 'registro_propuesta';

     public function evento()
	 {
   		 return $this->belongsTo(Evento::class);
	 }

	 public function user()
	 {
   		 return $this->belongsTo(User::class);
	 }

	

	 
}
