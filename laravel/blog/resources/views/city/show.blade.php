@extends('layouts.app')

@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Страна</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($cities as $city)
            <tr>
                <th scope="row">{{ $city->getId() }}</th>
                <td>{{ $city->getName() }}</td>
                @if ($city->getCountry())
                    <td>{{ $city->getCountry()->getName() }}</td>
                @else
                    <td>-</td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection