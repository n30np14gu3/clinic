@extends('index')

@section('page-title', 'Отчет об осмотре')

@section('main-content')
    <form action="{{url('/get_report')}}" method="get">
        <div class="form-group">
            <label>
                Выберите отчет:
            </label>
            <select name="report_id" class="custom-select form-control">
                @foreach($reports as $r)
                    <option value="{{@$r->id}}">
                        [{{@$r->created_at}}] {{@$r->doctor->first_name}} {{@$r->doctor->last_name}} для {{@$r->patient->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-raised btn-info">Получить отчет</button>
        </div>
    </form>
@endsection
