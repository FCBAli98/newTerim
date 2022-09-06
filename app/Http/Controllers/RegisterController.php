<?php

namespace App\Http\Controllers;


use App\Http\Controllers\ExternalServiceController;
use App\Models\Cities;
use App\Models\Region;
use App\Models\Regions;
use Illuminate\Http\Request;
use App\Models\Citizens;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class RegisterController extends Controller
{

//    public static $url = 'http://military.mehnat.uz/resource/get-passport?';
//    public $layout = "employee";
//    public $defaultAction = 'first_step';
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

    public function firstStep(Request $request)
    {
        $model = new Citizens();
        $passport = $request->passport_seria.$request->passport_number;

        $params = $request->validate([
            'phone' => 'required',
            'passport_seria' => 'required|max:2|string',
            'passport_number' => 'required',
        ]);


        if (!$this->freePhone($params['phone'])){
            return redirect()->back()->with('mass', 'Бу телефон рақамдан 3 мартадан ортиқ фойдаланиш мумкин эмас!');
        }

        if (Citizens::query()->where('passport_seria', $request['passport_seria'])->where('passport_number', $request['passport_number'])->first()){
            return redirect()->route('register.index')->with('mass', 'Бу фуқаро тизимда мавжуд!');
        }

        $person = ExternalServiceController::getSoliqPerson($passport);

        $personData = [
            'sname' => "",
            'fname' => "",
            'gender' => "",
            'address' => "-",

        ];
        if (isset($person['result']['lname']) && isset($person['result']['lname'])){
            $personData = $person['result'];
        }

        $citizen['phone'] = $params['phone'];
        $citizen['passport_number'] = $params['passport_number'];
        $citizen['passport_seria'] = $params['passport_seria'];

        return redirect()->route('detail_info', [
            'personData' => $personData,
            'citizen' => $citizen

        ]);
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

        $passport = $request->passport_seria.$request->passport_number;

        $params = $request->validate([
            'phone' => 'required',
            'passport_seria' => 'required|max:2|string',
            'passport_number' => 'required',
        ]);


        if (!$this->freePhone($params['phone'])){
            return redirect()->back()->with('mass', 'Бу телефон рақамдан 3 мартадан ортиқ фойдаланиш мумкин эмас!');
        }

        if (Citizens::query()->where('passport_seria', $request['passport_seria'])->where('passport_number', $request['passport_number'])->first()){
                return redirect()->route('first_step.index')->with('mass', 'Бу фуқаро тизимда мавжуд!');
        }

        $person = ExternalServiceController::getSoliqPerson($passport);

        $personData = [
            'sname' => "",
            'fname' => "",
            'gender' => "",
            'address' => "-",

        ];
        if (isset($person['result']['lname']) && isset($person['result']['lname'])){
            $personData = $person['result'];
        }

        return redirect()->route('/detail_info');

    }


    public function actionDetail(Request $request)
    {
//        dd($request->all());
        $model = new Citizens();

        if
        (
            isset($request['citizen']['phone']) &&
            isset($request['citizen']['passport_seria']) &&
            isset($request['citizen']['passport_number'])
        )
        {
            $model->phone_number = $request['citizen']['phone'];
            $model->passport_number = $request['citizen']['passport_number'];
            $model->passport_seria = $request['citizen']['passport_seria'];
            $model->second_name = isset($request['personData']['sname']) ? $request['personData']['sname'] : "";
            $model->first_name = isset($request['personData']['fname']) ? $request['personData']['fname'] :"";
            $model->gender = isset($request['personData']['gender']) ?$request['personData']['gender'] :"";
            $model->address = isset($request['personData']['address']) ? $request['personData']['address'] : "-";


            if (isset($request['personData']['ns10_code'])){
                $region = Regions::query()->where('ns10_code', $request['personData']['ns10_code'])->first();
                if ($region){
                        $model->region_id = $region? $region->id:null;
                        $city = Cities::query()->where('region_id', $region->id)->where('ns11_code', $request['personData']['ns11_code']);
                        $model->city_id =$city? $city->id:null;
                }
            }
        }

        return view('register.detail', compact('model'));
    }



    public function freePhone($phone){
        $freePhone = Citizens::query()->where(['phone_number' => $phone])->count();
        return $freePhone <= 3;
    }



}
