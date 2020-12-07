<?php


namespace App\Http\Controllers\Classes;


use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        return view('Classes/Class');
    }
}
