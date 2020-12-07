<?php


namespace App\Http\Controllers\Headquartes;


use App\Http\Constants\CourseStatus;
use App\Http\Controllers\Controller;
use App\Http\Model\Course;

class HeadCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        $courseData = Course::query()->where('status',CourseStatus::NORMAL)->get();
        return view('Headquarters.Head_course')->with('courseData',$courseData);
    }
}
