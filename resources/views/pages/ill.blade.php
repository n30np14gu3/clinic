@extends('index')

@section('page-title', 'Информация о больных')
@section('ill', 'active')

@section('main-content')
    <form id="get_ills_form">
        <div class="form-group">
            <label>Введите болезнь: </label>
            <input type="text" maxlength="100" name="ill" class="form-control" required onfocus>
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-raised btn-info">Получить список больных</button>
        </div>
    </form>
    <hr>
    <table class="table table-bordered table-hover table-striped" id="ills_table">
        <thead>
        <tr>
            <th>Врач</th>
            <th>Пациент</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection
