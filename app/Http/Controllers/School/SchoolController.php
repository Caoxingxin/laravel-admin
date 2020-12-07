<?php


namespace App\Http\Controllers\School;


use App\Http\Constants\ClassStatus;
use App\Http\Controllers\Controller;
use App\Http\Model\Classes;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(Request $request){
        $school_id  = $request->input('school_id');
        $school_name = $request->input('school_name');
        return view('School/School')->with('school_id',$school_id)->with('school_name',$school_name);
    }

    public function class_list(Request $request){
        $school_id  = $request->input('school_id');
        $classData = Classes::query()
            ->where('school_id',$school_id)
            ->where('status',ClassStatus::ENABLE)
            ->orderBy('created_at')
            ->get();
        return view('School/School_Class-manage')->with('classData',$classData)->with('school_id',$school_id);
    }
}
