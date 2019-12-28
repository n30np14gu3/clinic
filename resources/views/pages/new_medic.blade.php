@extends('index')

@section('page-title', 'Добавление нового лекарства')
@section('new_medic', 'active')

@section('main-content')
    <form id="new_medic_form">
        <div class="form-row">
            <div class="form-group col-md-9">
                <label>Название лекарства</label>
                <input type="text" class="form-control" maxlength="100" name="name" required>
            </div>
            <div class="form-group col-md-3">
                <label>Тип приема</label>
                <input type="text" class="form-control" maxlength="100" name="use_type" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Ожидаемый эффект</label>
                <input type="text" class="form-control" maxlength="100" name="action" required>
            </div>
            <div class="form-group col-md-6">
                <label>Побочные эффекты</label>
                <input type="text" class="form-control" maxlength="100" name="post_effect" required>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-info btn-raised" type="submit">Добавить лекарство</button>
        </div>
    </form>
@endsection
