<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    //
	 protected $table = 'evento';

     public function pais()
	 {
   		 return $this->belongsTo(Pais::class);
	 }

	 public function ciudad()
	 {
   		 return $this->belongsTo(Ciudad::class);
	 }

	 public function banda()
	 {
   		 return $this->belongsTo(Banda::class);
	 }
	 
	 public function productora()
	 {
   		 return $this->belongsTo(Productora::class);
	 }
	
}
