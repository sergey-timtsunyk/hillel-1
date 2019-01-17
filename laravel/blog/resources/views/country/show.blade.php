@extends('layouts.app')

@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Код</th>
            <th scope="col">Код телефона</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($countries as $country)
            <tr>
                <th scope="row">{{ $country->getId() }}</th>
                <td>{{ $country->getName() }}</td>
                <td>{{ $country->getCode() }}</td>
                <td>{{ $country->getPhoneCode() }}</td>
                <td>
                    <button onclick="location.href='{{ url('/countries/add') }}'" type="button" class="btn btn-outline-primary btn-sm">Добавить</button>
                    <button onclick="location.href='{{ url('/countries/edit/'.$country->getId()) }}'" type="button" class="btn btn-outline-secondary btn-sm">Редактировать</button>
                    <button onclick="location.href='{{ url('/countries/delete/'.$country->getId()) }}'" type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection