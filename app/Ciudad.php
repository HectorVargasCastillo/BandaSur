<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    //
     protected $table = 'ciudad';


	public function pais()
	{
   		 return $this->belongsTo(Pais::class);
	}

}

