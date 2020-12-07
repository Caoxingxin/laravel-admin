<?php


namespace App\Http\Services;


use App\Http\Constants\SchoolStatus;
use App\Http\Model\School;
use School\Constants\ClassStatus;
use School\Models\Classes;

class ClassDataListServices
{
    public function classData(){
        $classData = Classes::query()->where('status',ClassStatus::ENABLE)->orderBy('created_at')->get();
        return $classData;
    }
}
