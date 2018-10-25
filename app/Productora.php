<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productora extends Model
{
    //
     protected $table = 'productora';

     public function pais()
	 {
   		 return $this->belongsTo(Pais::class);
	 }

	 public function ciudad()
	 {
   		 return $this->belongsTo(Ciudad::class);
	 }



}
