@extends('layouts.app')

{{-- ! Page name --}}
@section('title', 'Dishes details')

{{-- !! Main-Content --}}
@section('content')
<section>
    <div class="container mb-4">

        {{-- * Return-button to the restaurant-details of this dish --}}
        <a href="{{ route('admin.restaurants.show', $restaurant) }}" 
            class="btn btn-primary mb-4 me-2">
            <i class="fa-solid fa-circle-left fa-beat "></i>
            Return to Restaurant
        </a>

        {{-- * Return-button to the dishes list --}}
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary mb-4">
            <i class="fa-solid fa-circle-left fa-beat"></i>
            Return to Dishes List
        </a>

        {{-- * Main title page --}}
        <h1 class="mb-4">Dish details</h1>

        {{-- * Row/col layout of the main --}}
        <div class="row">
            <div class="col-sm-12 col-md-6">
                {{-- Dish image --}}
                <div class="overflow-hidden rounded ">
                    <img src="{{ $dish->image ? asset('storage/' . $dish->image) : '' }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                {{-- Card of the dish info --}}
                <div class="card">
                    {{-- ? Card header / dish name --}}
                    <div class="card-header">
                        <h3>{{ $dish['name'] }}</h3>
                    </div>
                    {{-- ? Card body --}}
                    <div class="card-body">
                        {{-- Dish description --}}
                        <p class="card-text"><strong>Descrizione: </strong>
                            {{ $dish['description'] }}
                        </p>
                        {{-- Dish availability --}}
                        <p><strong>Disponibilità: </strong>
                            {{ $dish->availability === 1 ? 'attualmente disponibile' : 'non disponibile' }}
                        </p>
                        {{-- Dish price --}}
                        <p><strong>Prezzo: </strong>
                            <i>{{ $dish['price'] }} €</i>
                        </p>
                        {{-- // Another button/link to the dishes list if needed --}}
                        {{-- // <a href="{{ route('admin.dishes.index', $restaurant) }}" class="my-4 btn btn-primary menubutton">
                             // <span>MENU</span>
                             // <div class="icon"><i class="fa-solid fa-bars"></i></div>
                             // </a> --}}
                        {{-- Button/link to edit-dish --}}
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

{{-- ! CSS --}}
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
