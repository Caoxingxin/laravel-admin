<?php


namespace App\Http\Services;


use App\Http\Constants\SchoolStatus;
use App\Http\Model\School;

class SchoolDataListServices
{
    public function schoolData(){
        $schoolData = School::query()->where('status',SchoolStatus::OPEN)->orderBy('created_at')->get();
        return $schoolData;
    }
}
