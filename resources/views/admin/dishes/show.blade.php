@extends('layouts.app')

@section('content')
    <section>
        <div class="container mb-4">

            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary mb-4">
                <i class="fa-solid fa-circle-left fa-beat"></i>
                Return to dishes list
            </a>

            <h1 class="mb-4">Dish details</h1>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="overflow-hidden rounded ">
                        <img src="{{ $dish->image ? asset('storage/' . $dish->image) : '' }}" alt="" class="w-100">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">

                    <div class="card">
                        <div class="card-header">
                            <h3>{{ $dish['name'] }}</h3>
                        </div>



                        <div class="card-body">
                            <p class="card-text">
                                <strong>Descrizione:</strong>
                                {{ $dish['description'] }}
                            </p>

                            <p>
                                <strong>Disponibilità: </strong>
                                {{ $dish->availability === 1 ? 'attualmente disponibile' : 'non disponibile' }}
                            </p>

                            <p>
                                <strong>Prezzo: </strong>
                                <i>
                                    {{ $dish['price'] }} €
                                </i>
                            </p>

                            {{-- <a href="{{ route('admin.dishes.index', $restaurant) }}" class="my-4 btn btn-primary menubutton">
                        <span>MENU</span>
                        <div class="icon"><i class="fa-solid fa-bars"></i></div>
                    </a> --}}

                            <a href="{{ route('admin.dishes.edit', $dish) }}" class="my-4 btn btn-primary editbutton">
                                <span>EDIT</span>
                                <div class="icon"><i class="fa-solid link-white fa-pencil me-2"></i></div>

                            </a>
                        </div>
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
