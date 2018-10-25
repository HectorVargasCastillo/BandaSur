<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    //
     protected $table = 'banda';

     public function pais()
	 {
   		 return $this->belongsTo(Pais::class);
	 }

	 public function ciudad()
	 {
   		 return $this->belongsTo(Ciudad::class);
	 }

	 public function estilo()
	 {
   		 return $this->belongsTo(Estilo::class);
	 }

}
