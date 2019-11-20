<?php

namespace App\Http\Controllers;

use App\ApplicationForChangingData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
class DataChangeRequestsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::check())
            return redirect('/login');
        else {
            $dataToChange = ApplicationForChangingData::where('user_id', Auth::user()->id)->get();
            return view('dataChangeRequests', ["isDataToChangeExist" => $dataToChange]);
        }
    }

    public function sendApplicationForChangingData(Request $request){
        $dataToStore = new ApplicationForChangingData;

            $dataToStore->user_id = Auth::user()->id;
            $dataToStore->name = $request->input('name');
            $dataToStore->lastname = $request->input('lastname');
            $dataToStore->typestudy = $request->input('typestudy');
            $dataToStore->levelstudy = $request->input('levelstudy');
            $dataToStore->department = $request->input('department');
            $dataToStore->direction = $request->input('direction');
            $dataToStore->specialization = $request->input('specialization');
            $dataToStore->save();

        return redirect('dataChangeRequests');
    }

    public function acceptEditChange(Request $request){
        $userUpdateData = User::findOrFail(Auth::id());
        $applicationUpdateData = ApplicationForChangingData::where('user_id',Auth::user()->id)->first();

        $userUpdateData->fill([
            'name' => $applicationUpdateData->name,
            'lastname' => $applicationUpdateData->lastname,
            'typestudy' => $applicationUpdateData->typestudy,
            'levelstudy' => $applicationUpdateData->levelstudy,
            'department' => $applicationUpdateData->department,
            'direction' => $applicationUpdateData->direction,
            'specialization' => $applicationUpdateData->specialization
        ]);
        $userUpdateData -> save();
        $applicationUpdateData->delete();

        return redirect('dataChangeRequests');
    }
}
