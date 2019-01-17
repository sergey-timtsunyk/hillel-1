@extends('layouts.app')

@section('content')

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
@include('errors')

<!-- Форма новой задачи -->
    <form action="{{ url('countries/edit/'.$country->getId()) }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Имя</label>

            <div class="col-sm-6">
                <input type="text" name="name" class="form-control" value="{{ $country->getName() }}">
            </div>
        </div>
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Код</label>

            <div class="col-sm-6">
                <input type="text" name="code" class="form-control" value="{{ $country->getCode() }}">
            </div>
        </div>

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Код телефона</label>

            <div class="col-sm-6">
                <input type="text" name="phone_code" class="form-control" value="{{ $country->getPhoneCode() }}">
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Редактировать Страну
                </button>
            </div>
        </div>
    </form>
</div>

@endsection