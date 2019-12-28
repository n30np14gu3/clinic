@extends('pdf')

@section('main-content')
    <div class="container align-items-center">
        <h3 class="text-center">Отчет об обследовании пациента [{{@$report->patient->name}}]</h3>
        <div class="card" id="medic_card">
            <div class="card-body">
                <h5 class="card-title">Отчет #{{@$report->id}}</h5>
                <dl class="row">
                    <dt class="col-sm-2">Лечащий врач</dt>
                    <dd class="col-sm-10">{{@$report->doctor->first_name}} {{@$report->doctor->last_name}}</dd>

                    <dt class="col-sm-2">Пациент</dt>
                    <dd class="col-sm-10">{{@$report->patient->name}}. Дата рождения: {{@$report->patient->birth_date}}. Пол: {{@$report->patient->sex ? 'М' : 'Ж'}}</dd>

                    <dt class="col-sm-2">Дата приема</dt>
                    <dd class="col-sm-10">{{@$report->created_at}}</dd>

                    <dt class="col-sm-2">Вызов на дом</dt>
                    <dd class="col-sm-10">{{@$report->to_home ? 'Да' : 'Нет'}}</dd>

                    @if(@$report->to_home)
                        <dt class="col-sm-2">Адрес проживания</dt>
                        <dd class="col-sm-10">{{@$report->patient->address}}</dd>
                    @endif

                    <dt class="col-sm-2">Диагноз</dt>
                    <dd class="col-sm-10">{{@$report->diagnosis}}</dd>

                    @if(@$report->medic_name != null)
                        <dt class="col-sm-2">Выписано лекарство</dt>
                        <dd class="col-sm-10">{{@$report->medic_name}}</dd>
                    @else
                        <dt class="col-sm-12">Лекартсво не выписано</dt>
                    @endif
                    <br><br>
                    <dt class="col-sm-12">Дата формирования отчета:{{date("Y-m-d H:i:s")}}</dt>
                    <dt class="col-sm-12"><a href="{{url('/patient_report')}}">Назад</a></dt>
                </dl>
            </div>
        </div>
    </div>
@endsection
