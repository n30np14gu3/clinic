@extends('index')

@section('page-title', 'Информация о лекарстве')
@section('medic_info', 'active')

@section('main-content')
    <form id="get_medic_info">
        <div class="form-group">
            <label>Выберите лекарство: </label>
            <select class="custom-select" required name="medic_id">
                @foreach(@$medics as $m)
                    <option value="{{@$m->id}}">{{@$m->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-raised btn-info">Получить информацию</button>
        </div>
    </form>
    <hr>
    <div class="card" id="medic_card" style="display: none">
        <div class="card-body">
            <h5 class="card-title">Информация о лекарстве</h5>
            <dl class="row">

                <dt class="col-sm-2">Наименование лекарства</dt>
                <dd class="col-sm-10" id="medic_name">{medic_name}</dd>

                <dt class="col-sm-2">Тип приема</dt>
                <dd class="col-sm-10" id="medic_type">{type}</dd>

                <dt class="col-sm-2">Как действует</dt>
                <dd class="col-sm-10" id="medic_action">{effect}</dd>

                <dt class="col-sm-2">Побочные эффекты</dt>
                <dd class="col-sm-10" id="medic_post">{post}</dd>

            </dl>
        </div>
    </div>

@endsection
