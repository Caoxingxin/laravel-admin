<?php

namespace App\Http\Controllers;

use App\Http\Constants\SchoolStatus;
use App\Http\Model\School;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schoolData = School::query()->where('status',SchoolStatus::OPEN)->orderBy('created_at')->get();
        return view('home')->with('schoolData',$schoolData);
    }
}
