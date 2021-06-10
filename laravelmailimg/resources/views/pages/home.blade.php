@extends('layouts.main-layout')

@section('content')

    <h1>Car List:</h1>

    <ul>

        @foreach ($cars as $car)

            <li>

                Nome Macchina: {{$car -> name}} <br>

                Modello Macchina: {{$car -> model}}

                <br>

                @if ($car -> img)

                    <img src="{{ asset('storage/car-img/' . $car -> img) }}" alt="">

                @endif
                <br>
                <br>

            </li>

        @endforeach

    </ul>

@endsection
