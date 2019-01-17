@extends('layouts.app')

@section('content')

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
@include('errors')

<!-- Форма новой задачи -->
    <form action="{{ url('countries/add') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Имя</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Код</label>

            <div class="col-sm-6">
                <input type="text" name="code" id="task-name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Код телефона</label>

            <div class="col-sm-6">
                <input type="text" name="phone_code" id="task-name" class="form-control">
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Сохранить Страну
                </button>
            </div>
        </div>
    </form>
</div>

@endsection