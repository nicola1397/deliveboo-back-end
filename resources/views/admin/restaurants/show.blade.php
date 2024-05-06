@extends('layouts.app')

@section('title', 'Lista Ristoranti')



@section('content')

    <section>
        <div class="container">
            <a href="{{ route('admin.restaurants.index') }}" class="my-4 btn btn-primary">
                <i class="fa-solid fa-circle-left fa-beat"></i>
                Back to the List</a>

            <div class="row mb-5">

                <div class="col-sm-12 col-md-6 restaurantLayout  flex-column justify-content-center align-items-center">
                    {{-- COLONNA IMMAGINE --}}
                    <div class="coverImage rounded-top mb-0">
                        <img src="{{ asset('storage/' . $restaurant->image) }}" alt="{{ $restaurant->name }}"
                            class="w-100 h-auto">
                    </div>

                    {{-- COLONNA DATI --}}
                    <div class="col-sm-12 col-md-6 row detailsCard rounded-bottom">
                        {{-- NOME --}}
                        <div class="col-12 ">
                            <h5>Nome Ristorante</h5>
                            <h1 class="mb-3" class="detailCap">{{ $restaurant->name }}</h1>
                        </div>
                        {{-- PROPRIETARIO --}}
                        <div class="col-sm-12 col-md-6">
                            <h5>Proprietario</h5>
                            <p class="detailCap">{{ $restaurant->user->name }} {{ $restaurant->user->last_name }}</p>
                        </div>
                        {{-- TELEFONO --}}
                        <div class="col-sm-12 col-md-6">
                            <h5>Telefono</h5>
                            <p class="detailCap">{{ $restaurant->phone }}</p>
                        </div>
                        {{-- PARTITA IVA --}}
                        <div class="col-sm-12 col-md-6">
                            <h5>Partita Iva</h5>
                            <p class="detailCap">{{ $restaurant->p_iva }}</p>
                        </div>
                        {{-- INDIRIZZO --}}
                        <div class="col-sm-12 col-md-6">
                            <h5>Indirizzo</h5>
                            <p class="detailCap">{{ $restaurant->address }}</p>
                        </div>
                        {{-- TIPO RISTORANTE --}}
                        <div class="col-12">
                            <h5 class="mb-4">Tipologia Ristorante</h5>
                            @foreach ($restaurant->types as $type)
                                {{-- <p class="detailCap">{{ $type->label }}</p> --}}
                                <div class="badge">
                                    <div class="typeBadge">
                                        <div class="badgeImg"><img src="{{ asset($type->image) }}" alt=""
                                                width="100%">
                                        </div>
                                        <span>{{ $type->label }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- BUTTON -->
                    {{-- <div class="col-8">
                        <a href="{{ route('admin.dishes.index', $restaurant) }}" class="btn btn--action">
                            <span>MENU</button>
                        </a>
                    </div> --}}

                    {{-- <a href="{{ route('admin.dishes.index', $restaurant) }}" class="my-4 btn btn-primary menubutton">
                        <span>MENU</span>
                        <div class="icon"><i class="fa-solid fa-bars"></i></div>
                    </a> --}}


                </div>

                <div class="col-6 d-flex flex-column justify-content-center">
                    <h2 class="text-center mb-5">I NOSTRI PIATTI</h2>

                    <div class="d-flex justify-content-center menuPreview">
                        @foreach ($dishes as $dish)
                            <a href="{{ route('admin.dishes.show', $dish) }}">
                                <div class="d-flex mb-3">

                                    <div class="roundDish">

                                        <div class="dishPrev">
                                            <img src="{{ asset('storage/' . $dish->image) }}" alt="">
                                        </div>

                                    </div>
                                    {{-- <div class="d-flex flex-column justify-content-center ms-5">
                                        <h3 class="text-white">{{ $dish->name }}</h3>
                                        <h3 class="text-white">€{{ $dish->price }}</h3>

                                    </div> --}}

                                </div>
                            </a>
                        @endforeach

                    </div>
                    <!-- BUTTON -->
                    <div class="col-8 align-self-center mt-5">
                        <a href="{{ route('admin.dishes.index', $restaurant) }}" class="btn btn--action">
                            <span>GESTISCI IL MENU</button>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
