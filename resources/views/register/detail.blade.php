@extends('layouts.app')
<?php
use App\Models\Regions;
use App\Models\Cities;
use App\Models\Makhallas;
use App\Models\Otryad;
//$this->title = "Ўзингиз ҳақидаги маълумотларни киритинг";
$region_list = Regions::select();
$otryad_list = Otryad::select();
//$type_employer_list = TypeEmployer::select();
$city_list = Cities::select($model->region_id);
$makhalla_list = Makhallas::select($model->city_id);

$wanted_regions = [
'17' => 'Тошкент вилояти',
'19' => 'Жиззах вилояти',
'18' => 'Қашқадарё вилояти',
'14' => 'Сурхандарё вилояти',
'15' => 'Сирдарё вилояти'
];

//$gender_list = [1 => Yii::t('app', 'Male'), 2 => Yii::t('app', 'Female')];

$lifetime_list = [15 => '15 кун' , 30 => '30 кун' , 999 => 'Мавсум охиригача'];

?>
@section('content')
    <div class="mainContainer minContainer">
        <div id="fixedBlockParentRow" class="pageRow2">
            <div class="contentBlock borderedBlock">
                <div class="title-3 textCenter"><?= date('Y')?> йилги пахта терими</div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="row">
                        <div class="col-md-2" style="margin-top: 20px;">
                            <br>
                            <div class="formControl">
                                <label>Телефон рақам</label>
                                <input class="formField" name="phone" {{ $model->phone_number ? 'disabled' : false }}  value="{{$model->phone_number}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <div class="formControl">
                                <label>Паспорт серия</label>
                                <input class="form-control phone formField" name="passport_number" {{ $model->passport_seria ? 'disabled' : false }} value="{{$model->passport_seria}}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <div class="formControl">
                                <label>Паспорт рақам</label>
                                <input class="form-control phone formField" name="passport_number" {{ $model->passport_number ? 'disabled' : false }} value="{{$model->passport_number}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Исм</label>
                            <input class="form-control phone formField" name="phone" {{ $model->first_name ? 'disabled' : false }} value="{{$model->first_name}}">
                        </div>
                        <div class="col-md-4">
                            <label>Фамилия</label>
                            <input class="form-control phone formField" name="phone" {{ $model->second_name ? 'disabled' : false }} value="{{$model->second_name}}">
                        </div>
                        <div class="col-md-4">
                            <label>Жинс</label>
                            <input class="form-control phone formField" name="phone" list="gender"
                                   <?php
                                            if ($model->gender == 1){
                                                $result = 'Erkak';
                                            }elseif ($model->gender == 2){
                                                $result = 'Ayol';
                                            }else{
                                                $result = '';
                                            }

                                   ?>
                                   {{ $model->gender ? 'disabled' : false }}
                                   value="{{$result}}"

                            >
                            <datalist id="gender">
                                <option value="Erkak">
                                <option value="Ayol">
                            </datalist>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Яшаш худуди</label>
                            <input class="form-control phone formField" name="phone">
                        </div>
                        <div class="col-md-4">
                            <label>Яшаш Тумани(шахар)</label>
                            <input class="form-control phone formField" name="phone">
                        </div>
                        <div class="col-md-4">
                            <label>Яшаш маҳалласи</label>
                            <input class="form-control phone formField" name="phone">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Кейинги <i class="glyphicon glyphicon-arrow-right"></i></button>
                    </div>

                </form>
            </div>
        </div>
    </div>










@endsection
