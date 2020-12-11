<?php


namespace App\Http\Services\Headquartes;


use App\Http\Model\School;
use Illuminate\Support\Facades\DB;

class HeadSchoolServices
{
    public function create($data){
        try {
            DB::beginTransaction();

            $schoolData = School::query()->create($data);

            DB::commit();

            return $schoolData;

        }catch (\Exception $exception)
        {
            DB::rollBack();
        }
    }
    public function update_status($data){
        try {
            DB::beginTransaction();

            $schoolData = School::query()->where('id',$data['id'])->first();
            $schoolData->update(['status'=>$data['status']]);
            DB::commit();

            return $schoolData;

        }catch (\Exception $exception)
        {
            DB::rollBack();
        }
    }
    public function update($data){
        try {
            DB::beginTransaction();

            $schoolData = School::query()->where('id',$data['id'])->first();
            $schoolData->update($data);
            DB::commit();

            return $schoolData;

        }catch (\Exception $exception)
        {
            DB::rollBack();
        }
    }
    public function detail($data){
        return School::query()->where('id',$data['id'])->first()->toArray();
    }
}
