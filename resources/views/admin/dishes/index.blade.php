@extends('layouts.app')

{{-- ! Page name --}}
@section('title', 'Dishes list')

{{-- !! Main-Content --}}
@section('content')
    <section>
        <div class="container mt-4 mb-4">


            {{-- * Main title page --}}
            <h1 class="text-center mb-5">I tuoi piatti</h1>

            {{-- * Dishes list/grill --}}
            <div class="row gy-3 gx-3">
                @forelse($dishes as $dish)
                    <div class="col-lg-3 col-md-6 col-sm-12 p-6">
                        {{-- Dish card --}}
                        <div class="myCard h-100">
                            <!-- Dish image -->
                            <div class="coverImage dishCover">
                                <img src="{{ !empty($dish->image) ? asset('storage/' . $dish->image) : asset('storage/assets/placeholder.jpg') }}"
                                    alt="{{ $dish->name }}" class="w-100">
                                {{-- // <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}" class="w-100"> --}}
                            </div>
                            <div class="d-flex flex-column justify-content-between flex-grow-1">
                                <div class="mb-4 d-flex flex-column justify-content-between flex-grow-1">
                                    <div>
                                        <!-- Dish name -->
                                        <h3 class="detailCap">{{ $dish->name }}</h3>
                                        <!-- Dish description -->
                                        <p>{{ $dish->getAbstract() }}</p>
                                    </div>
                                    <h3>€{{ $dish->price }}</h3>
                                </div>
                                <!-- Action buttons -->
                                <div class="d-flex align-items-center justify-content-between">
                                    {{-- ? Details button --}}
                                    <a class="ballButton" href="{{ route('admin.dishes.show', $dish) }}">
                                        <i class="fa-solid fa-eye"></i></a>
                                    {{-- ? Edit button --}}
                                    <a class="ballButton" href="{{ route('admin.dishes.edit', $dish) }}">
                                        <i class="fa-solid fa-pencil"></i></a>
                                    {{-- ? Destroy/delete button --}}
                                    <button type="button" class="deletebutton" data-bs-toggle="modal"
                                        data-bs-target="#dish-{{ $dish->id }}">
                                        <span>CANCELLA</span>
                                        <div class="icon"><i class="fa-solid fa-trash"></i></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Message if list/grill is empty  --}}
                @empty
                    <h2>Nessun Piatto trovato</h2>
                @endforelse

                {{-- * Add dish button --}}
                <div class="col-lg-3 col-md-6 col-sm-12" id="addButton">
                    <a href="{{ route('admin.dishes.create') }}" class="ballButton">
                        <i class="fa-solid fa-plus fa-xl "></i></a>
                </div>
                {{-- * Pagination --}}
                {{ $dishes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection

{{-- ! Modal --}}
@section('modal')
    {{-- * Foreach of the modal --}}
    @foreach ($dishes as $dish)
        <div class="modal fade" id="dish-{{ $dish->id }}" tabindex="-1" aria-labelledby="dish-{{ $dish->id }}"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- Modal title --}}
                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Cancella {{ $dish->name }}?</h1>
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
                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite('resources/scss/indexs.scss')
@endsection
