<?php


namespace App\Http\Controllers\Headquartes;


use App\Http\Controllers\Controller;
use App\Http\Model\School;
use App\Http\Requests\HeadSchoolCreateRequest;
use App\Http\Services\Headquartes\HeadSchoolServices;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $schoolData = School::query()->orderBy('created_at')->get();
        return view('Headquarters/Head')->with('schoolData', $schoolData);
    }
    //更新状态
    public function update_status(Request $request,HeadSchoolServices $services){
        $data = $request->all();
        $value = $services->update_status($data);
        return $value;
    }
    //更新
    public function update(Request $request,HeadSchoolServices $services){
        $data = $request->all();
        $value = $services->update($data);
        return $value;
    }
    //详情
    public function detail(Request $request,HeadSchoolServices $services){
        $data = $request->all();
        $value = $services->detail($data);
        return $value;
    }

    //创建学校页面
    public function create_list()
    {
        return view('Headquarters/Head_school-create');
    }
    //创建学校接口
    public function create(HeadSchoolCreateRequest $request, HeadSchoolServices $services)
    {
        $data = $request->all();
        $request->validate();
        $s = $services->create($data);
        return redirect('head-school');
    }
}
