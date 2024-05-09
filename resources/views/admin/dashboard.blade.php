@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-body mt-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


        </div>
        <h2 class="fs-4 text-white my-4">

            {{-- schermata dashboard  --}}


            {{ __('Bentornato') . ' ' . Auth::user()->name . ' nella tua pagina personale' }}
        </h2>

        <div class="row justify-content-center h-100    ">
            <div class="col-9">
                <div class="card h-50 rounded-top rounded-bottom-0">
                    <div class="">{{ __('qua ci vanno le statistiche') }} </div>


                </div>
                <div class="card h-50 mt-2 rounded-top-0 rounded-bottom">
                    <div class=" ">
                        {{ __('qua ci vanno gli ordini') }}</div>


                </div>


            </div>
            {{--  --}}
            <div class="col-3 myCard">
                {{-- qua andremo a mostrare l'index del ristorante --}}
                {{-- <div class="card ">
                    <div class="card-body"> --}}
                {{-- <h5 class="card-title">{{ Auth::user()->name }}</h5> --}}
                <div class="coverImage"><a href="{{ route('admin.restaurants.index') }}" class="card-link">
                        @foreach ($restaurants as $restaurant)
                            <img class="card-img-bottom"
                                src="{{ !empty($restaurant->image)
                                    ? asset('storage/' . $restaurant->image)
                                    : asset('storage/uploads/placeholder.png') }}">
                        @endforeach
                    </a>
                </div>
                {{-- </div>
                </div> --}}
                <div class="card mt-4">
                    <button class="btn btn-warning"><a href="{{ route('admin.dishes.index') }}"> Ecco i tuoi piatti
                            🍝</a>
                        </a>
                    </button>
                </div>

            </div>
        </div>
    @endsection

    {{-- ! CSS --}}
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        @vite('resources/scss/indexs.scss')
    @endsection
