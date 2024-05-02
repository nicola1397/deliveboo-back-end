@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>i nostri ristoranti</h1>
        <ul>
            @foreach ($restaurants as $restaurant)
                <li>
                    {{ $restaurant->name }}
                    <ul>
                        <li>
                            {{ $restaurant->address }}
                        </li>
                        <li>
                            image: {{ $restaurant->image }}
                        </li>
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
