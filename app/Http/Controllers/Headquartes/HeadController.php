<?php


namespace App\Http\Controllers\Headquartes;


use App\Http\Constants\SchoolStatus;
use App\Http\Controllers\Controller;
use App\Http\Model\School;

class HeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        $schoolData = School::query()->where('status',SchoolStatus::OPEN)->orderBy('created_at')->get();
        return view('Headquarters/Head')->with('schoolData',$schoolData);
    }
}
