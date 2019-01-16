@extends('layouts.app')

@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Код</th>
            <th scope="col">Код телефона</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($countries as $country)
            <tr>
                <th scope="row">{{ $country->getId() }}</th>
                <td>{{ $country->getName() }}</td>
                <td>{{ $country->getCode() }}</td>
                <td>{{ $country->getPhoneCode() }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection