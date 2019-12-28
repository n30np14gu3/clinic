@extends('index')

@section('page-title', 'Добавление новго отчета')

@section('new_report', 'active')

@section('main-content')
    <form id="new_report_form">
        <div class="form-group">
            <label>Выберите пациента</label>
            <select class="custom-select form-control" name="patient_id" required>
                @foreach(@$patients as $p)
                    <option value="{{@$p->id}}">{{@$p->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Введите диагноз</label>
            <input class="form-control" name="diagnosis" maxlength="100" required>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="to_home" id="to_home_check" class="custom-control-input" value="1">
                <label class="custom-control-label" for="to_home_check">Вызов на дом</label>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="need_medic" id="need_medic_check" class="custom-control-input" value="1">
                <label class="custom-control-label" for="need_medic_check">Прописать лекарство</label>
            </div>
        </div>
        <div class="form-group">
            <label>Выберите лекарство</label>
            <select class="custom-select form-control" name="medic_id" required>
                @foreach(@$medics as $m)
                    <option value="{{@$m->id}}">{{@$m->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-raised btn-info btn-block" type="submit">Добавить отчет</button>
        </div>
    </form>
@endsection
