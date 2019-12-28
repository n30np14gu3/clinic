<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>@yield('page-title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script src="{{url('/js/vendor/jquery-3.4.1.slim.min.js')}}" type="text/javascript"></script>
    <script src="{{url('/js/vendor/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{url('/bootstrap/css/bootstrap-material-design.css')}}">
    <meta name="theme-color" content="#563d7c">
    <style>
        /* fallback */
        @font-face {
            font-family: 'Material Icons';
            font-style: normal;
            font-weight: 400;
            src: url(https://fonts.gstatic.com/s/materialicons/v48/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
        }

        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Мед сервис</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-collapse" aria-controls="nav-collapse" aria-expanded="false" aria-label="">
            <i class="material-icons">more_vert</i>
        </button>
        <div class="collapse navbar-collapse navbar-light" id="nav-collapse">
            <ul class="navbar-nav mr-auto  navbar-light">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="info-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Информация</a>
                    <div class="dropdown-menu" aria-labelledby="info-dropdown">
                        <a class="dropdown-item @yield('calls_by_day')" href="{{url('/info/calls_by_day')}}">Вызовы в этот день</a>
                        <a class="dropdown-item @yield('ill')" href="{{url('/info/ill')}}">Информация по больным</a>
                        <a class="dropdown-item @yield('medic_info')" href="{{url('/info/medic_info')}}">Информация о лекарстве</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('new_report')" href="{{url('/new_report')}}">Добавить отчет</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="report-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Справка</a>
                    <div class="dropdown-menu" aria-labelledby="report-dropdown">
                        <a class="dropdown-item @yield('patient_report')" href="{{url('/patient_report')}}">Отчет о вызове</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('new_medic')" href="{{url('/new_medic')}}">Новое лекарство</a>
                </li>
            </ul>
        </div>
    </nav>
</header>


<main role="main" class="flex-shrink-0">
    <div style="padding-top: 15px">
        <div class="container-fluid">
            @yield('main-content')
        </div>
    </div>
</main>
<script src="{{url('/js/vendor/popper.min.js')}}" type="text/javascript"></script>
<script src="{{url('/bootstrap/js/bootstrap-material-design.js')}}" type="text/javascript"></script>
<script src="{{url('/bootstrap/js/snackbar.min.js')}}" type="text/javascript"></script>
<script src="{{url('/js/main.js')}}" type="text/javascript"></script>
</body>
</html>
