<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Citizens;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{

    public static $url = 'http://military.mehnat.uz/resource/get-passport?';
    public $layout = "employee";
    public $defaultAction = 'first_step';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $model = Citizens::all();

        return view('register.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Citizens();

        $params = $request->validate([
            'phone' => 'required',
            'passport_seria' => 'required|max:2|string',
            'passport_number' => 'required',
        ]);
        $result = Citizens::query()->where('passport_seria', $request['passport_seria'])->where('passport_number', $request['passport_number'])->first();
        if (!$result){
                return redirect()->route('first_step.create');
        }


    }

    public function freePhone($phone){
        $freePhone = Citizens::find()->where(['phone_number' => $phone])->count();
        return $freePhone <= 3;
    }


}
