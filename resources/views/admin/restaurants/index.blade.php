@extends('layouts.app')

{{-- ! Page name --}}
@section('title', 'Restaurants List')

{{-- !! Main-Content --}}
@section('content')
<div class="container mb-4" id="bootstrap-overrides">

    {{-- * Main title page --}}
    <h1 class="my-4 text-center">I tuoi ristoranti</h1>

    {{-- // <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary mb-4"><i class="fa-solid fa-plus fa-lg me-2"></i>Nuovo ristorante</a> --}}

    {{-- * Restaurants list/grill --}}
    <div class="row justify-content-center">
        @forelse($restaurants as $restaurant)
        {{-- Restaurant card --}}
        <div class="myCard col-md-3 col-sm-12 me-3">
            <!-- Restaurant image -->
            <div class="coverImage">
                <img src="{{ !empty($restaurant->image)
                                ? asset('storage/' . $restaurant->image)
                                : asset('storage/uploads/placeholder.png') }}">
            </div>
            {{-- Restaurant name --}}
            <h3 class="detailCap">{{ $restaurant->name }}</h3>

            {{-- Restaurant address --}}
            <p class="detailCap">{{ $restaurant->address }}</p>

            <!-- Action buttons -->
            <div class="d-flex align-items-center justify-content-between">

                {{-- ? Details button --}}
                <a class="ballButton" href="{{ route('admin.restaurants.show', $restaurant) }}">
                    <i class="fa-solid fa-eye"></i></a>


                {{-- ? Edit button --}}
                {{-- // <a class="ballButton" href="{{ route('admin.restaurants.edit', $restaurant) }}"><i class="fa-solid fa-pencil"></i></a> --}}


                {{-- ? Destroy/delete button --}}
                <button type="button" class="deletebutton" data-bs-toggle="modal" data-bs-target="#restaurant-{{ $restaurant->id }}">
                    <span>Cancella</span>
                    <div class="icon"><i class="fa-solid fa-trash"></i></div>
                </button>
            </div>
        </div>

        {{-- Message if list/grill is empty  --}}
        @empty
        <h2>Nessun Ristorante Trovato</h2>
        @endforelse

        {{-- * Add restaurant button --}}
        {{-- <div class="col-lg-3 col-md-6 col-sm-12 restaurantPlus" id="addButton">
            <a href="{{ route('admin.restaurants.create') }}" class="ballButton"><i class="fa-solid fa-plus fa-xl me-2"></i></a>
    </div> --}}
    @endsection


    {{-- ! Modal --}}
    @section('modal')
    {{-- * Foreach of the modal --}}
    @foreach ($restaurants as $restaurant)
    <div class="modal fade" id="restaurant-{{ $restaurant->id }}" tabindex="-1" aria-labelledby="restaurant-{{ $restaurant->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- Modal title --}}
                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Cancella
                        {{ $restaurant->name }}?</h1>
                    {{-- Close modal button --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- Modal main text --}}
                <div class="modal-body text-black">
                    Sicuro di voler procedere?
                </div>
                {{-- Modal buttons area --}}
                <div class="modal-footer">
                    {{-- Close modal button --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Indietro</button>
                    {{-- Delete dish miniform --}}
                    <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- Delete dish button --}}
                        <button class="btn btn-danger">Cancella</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endsection


    {{-- ! CSS --}}
    @section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/scss/indexs.scss')
    @endsection
