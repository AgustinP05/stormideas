<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Nos permite interactuar con la base de datos

class IdeaController extends Controller
{
    public function index(){
        $ideas = DB::table("ideas")->get(); //SELECT * FROM ideas
        return view('ideas.index',['ideas'=>$ideas]);
    }
}
