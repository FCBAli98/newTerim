<?php

namespace App\Http\Controllers;

use App\Models\Citizens;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public static $url = 'http://military.mehnat.uz/resource/get-passport?';
    public $layouts = 'employee';
    public $defaultAction = 'first_step';

    public  function actionPhone(Request $request){
        $model = new Citizens();


        return view('register.index', $model);
    }
}
