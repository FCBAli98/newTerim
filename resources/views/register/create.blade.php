@extends('layouts.app')

@section('content')
<div class="minContainer1000 text-center" style="margin-top: 50px;">
    Ўзбекистон Республикаси Бандлик ва меҳнат муносабатлари вазирлигининг terim.uz сайтига хуш келибсиз! Агар Сиз Тошкент, Сирдарё ва Жиззах вилоятларига пахта теримига бормоқчи бўлсангиз, қуйидаги сўров шаклини тўлдиринг. Маълумотлар киритилгандан сўнг, Аҳоли бандлигига кўмаклашиш маркази мутахассислари 3 кун ичида Сиз билан боғланади.
</div>
<div class="pagePadding">
    <div class="mainContainer minContainer500">
        <div class="contentBlockBold borderedBlock">
            <div class="title-3 textCenter">
                {{date('Y')}} йилги пахта терими
            </div>
            <form action="{{route('first_step.store')}}" method="post" enctype="multipart/form-data">
                @csrf()
                <div class="form-group input tel">
                    <label>Шахсий мобил рақамингизни киритинг</label>
                    <input class="form-control phone formField" name="phone" data-mask = '+\9\9\899 999 99 99'>
                </div>

                <div class="form-group input">
                    <label>Паспорт серия</label>
                    <input class="form-control formField" name="passport_seria">
                </div>

                <div class="form-group input">
                    <label>Паспорт рақам</label>
                    <input class="form-control formField" name="passport_number">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-sm">Кейинги <i class="glyphicon glyphicon-arrow-right"></i></button>
            </form>

        </div>
    </div>
</div>


@endsection
