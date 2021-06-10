@extends('layouts.main-layout')

@section('content')

    <h1>CREATE YOUR NEW CAR!</h1>

    <form action="{{ route('store-car')}}"
     method="POST"

     enctype = "multipart/form-data">

        @csrf
        @method('POST')

        <div class="inputs">

            <div class="flex-input">

                <label for="name">Name</label>
                <input id="name" type="text" class="form-control border-input" name="name" required>

            </div>
            <div class="flex-input">

                <label for="model">Model</label>
                <input id="model" type="text" class="form-control border-input" name="model" required>

            </div>
            <div class="flex-input">

                <label for="kW">KW</label>
                <input id="kW" type="number" class="form-control border-input" name="kW" required>

            </div>

            <div class="flex-input">

                <label for="brand_id">Brand</label>
                <select name="brand_id" id="brand_id" class="form-control border-input" required>

                    <option value="" selected disabled>Brand</option>
                    @foreach ($brands as $brand)

                        <option value="{{$brand -> id}}">

                            {{$brand -> name}} ({{$brand -> nationality}})

                        </option>

                    @endforeach

                </select>


            </div>

             <div class="flex-input">

                <label for="image">Image</label>
                <input id="image" type="file" class="form-control border-input" name="image">

            </div>

            <input class="save-button" type="submit" value="SAVE YOUR CAR">

        </div>

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul>
                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>
            </div>

       @endif




    </form>

@endsection
