@extends('layouts.app')

{{-- ! Page name --}}
@section('title', 'Dishes details')

{{-- !! Main-Content --}}
@section('content')
    <section>
        <div class="container mt-4 mb-4">

            {{-- * Return-button to the restaurant-details of this dish --}}
            <a href="{{ route('admin.restaurants.show', $restaurant) }}" class="btn btn-primary mb-4 me-2">
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
                    <div class="overflow-hidden rounded dishDetailImg">
                        <img src="{{ !empty($dish->image) ? asset('storage/' . $dish->image) : asset('storage/assets/placeholder.jpg') }}"
                            alt="" class="w-100">
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
                            <div class="d-flex justify-content-between align-items-center">
                                {{-- Button/link to edit-dish --}}
                                <a href="{{ route('admin.dishes.edit', $dish) }}" class="my-4 btn btn-primary editbutton">
                                    <span>EDIT</span>
                                    <div class="icon"><i class="fa-solid link-white fa-pencil me-2"></i></div>
                                </a>
                                {{-- ? Destroy/delete button --}}
                                <button type="button" class="deletebutton" data-bs-toggle="modal"
                                    data-bs-target="#dish-{{ $dish->id }}">
                                    <span>DELETE</span>
                                    <div class="icon"><i class="fa-solid fa-trash"></i></div>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

{{-- ! Modal --}}
@section('modal')
    {{-- * Foreach of the modal --}}
    <div class="modal fade" id="dish-{{ $dish->id }}" tabindex="-1" aria-labelledby="dish-{{ $dish->id }}"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- Modal title --}}
                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Delete {{ $dish->name }}?</h1>
                    {{-- Close modal button --}}
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- Modal main text --}}
                <div class="modal-body text-black">
                    You CANNOT revert this action
                </div>
                {{-- Modal buttons area --}}
                <div class="modal-footer">
                    {{-- Close modal button --}}
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abort</button>
                    {{-- Delete dish miniform --}}
                    <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- Delete dish button --}}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



{{-- ! CSS --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
