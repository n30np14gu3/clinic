@extends('index')

@section('page-title', 'Список вызовов за день')
@section('calls_by_day', 'active')

@section('main-content')
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>Врач</th>
            <th>Пациент</th>
            <th>Вызов на дом</th>
            <th>Диагноз</th>
            <th>Лекарство</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reports as $r)
            <tr>
                <td>{{@$r->doctor->first_name}} {{@$r->doctor->last_name}}</td>
                <td>{{@$r->patient->name}}</td>
                <td>{{@$r->to_home ? 'Да': 'Нет'}}</td>
                <td>{{@$r->diagnosis}}</td>
                <td>{{@$r->medic_name == null ? 'Не выписано' : @$r->medic_name}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="5" scope="row">
                Всего вызовов: {{count(@$reports)}}
            </th>
        </tr>
        </tfoot>
    </table>
@endsection
