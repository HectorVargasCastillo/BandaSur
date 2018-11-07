<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;

class WelcomeController extends Controller
{
    /**
     * Show the application front.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('welcome');
        $slider_info = Evento::all();
        return view("welcome",['slider_info'=>$slider_info]);
		
    }

   
}
