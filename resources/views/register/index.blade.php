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
            <?php echo Form::model($model,['url' => route('register.store'), 'method' => 'post', 'files' => true]) ?>
            <div class="form-group{{ $errors->has('phone-number') ? ' has-error' : '' }}">
                <label>Шахсий мобил рақамингизни киритинг</label>
                <?= Form::number('phone-number', old('phone-number') ,['class' => 'form-control', 'rows' => '5' ,'id' => 'phone-number', 'required' => true]) ?>
                @if ($errors->has('phone-number'))
                    <span class="help-block">
                <strong>{{ $errors->first('phone-number') }}</strong>
            </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('passport-seria') ? ' has-error' : '' }}">
                <label>Паспорт серия</label>
                <?= Form::text('passport-seria', old('passport-seria') ,['class' => 'form-control', 'id' => 'passport-seria']) ?>
                @if ($errors->has('passport-seria'))
                    <span class="help-block">
            <strong>{{ $errors->first('passport-seria') }}</strong>
          </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('passport-number') ? ' has-error' : '' }}">
                <label>Паспорт рақам</label>
                <?= Form::number('passport-number', old('passport-number') ,['class' => 'form-control', 'id' => 'passport-number', 'required' => true]) ?>
                @if ($errors->has('passport-number'))
                    <span class="help-block">
            <strong>{{ $errors->first('passport-number') }}</strong>
          </span>
                @endif
            </div>

            <div class="text-right">
                <button class="btn btn-success" type="submit">Кейинги <i class="glyphicon glyphicon-arrow-right"></i></button>
            </div>

            <?php echo Form::close(); ?>

        </div>
    </div>
</div>


@endsection
