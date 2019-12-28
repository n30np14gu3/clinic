@extends('index')

@section('main-content')
    <form id="sign_in_form" style="width: 100%;max-width: 420px;padding: 15px;margin: auto; box-shadow: 0 0 3px black">
        <h3 class="text-center">Авторизация</h3>
        <div class="form-group">
            <label>Имя пользователя </label>
            <input type="text" class="form-control" maxlength="100" required autofocus>
        </div>

        <div class="form-group">
            <label>Пароль</label>
            <input type="password"  class="form-control" required>
        </div>
        <button class="btn btn-raised btn-primary btn-block" type="submit">Авторизация</button>
    </form>
@endsection
