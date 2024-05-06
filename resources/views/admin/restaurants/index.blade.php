@extends('layouts.app')

@section('title', 'Restaurants List')


@section('content')
    <div class="container mb-4" id="bootstrap-overrides">
        <h1 class="my-4 text-center">I tuoi ristoranti</h1>

        {{-- <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary mb-4"><i class="fa-solid fa-plus fa-lg me-2"></i>Nuovo ristorante</a> --}}

        <div class="row justify-content-center">
            @forelse($restaurants as $restaurant)
                <div class="myCard col-md-3 col-sm-12 me-3">
                    <div class="coverImage">
                        <img
                            src="{{ !empty($restaurant->image) ? asset('storage/' . $restaurant->image) : asset('storage/assets/placeholder.jpg') }}">
                        {{-- @dd($restaurant->image); --}}
                    </div>
                    <h3 class="detailCap">{{ $restaurant->name }}</h3>
                    <p class="detailCap">{{ $restaurant->address }}</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <a class="ballButton" href="{{ route('admin.restaurants.show', $restaurant) }}"><i
                                class="fa-solid fa-eye"></i></a>
                        <!-- <a class="ballButton" href="{{ route('admin.restaurants.edit', $restaurant) }}"><i class="fa-solid fa-pencil"></i></a> -->
                        <button type="button" class="deletebutton" data-bs-toggle="modal"
                            data-bs-target="#restaurant-{{ $restaurant->id }}"><span>DELETE</span>
                            <div class="icon"><i class="fa-solid fa-trash"></i></div>
                        </button>
                    </div>
                </div>
            @empty
                <h2>No Restaurant Found</h2>
            @endforelse
            <div class="col-lg-3 col-md-6 col-sm-12 restaurantPlus" id="addButton">
                <a href="{{ route('admin.restaurants.create') }}" class="ballButton"><i
                        class="fa-solid fa-plus fa-xl me-2"></i></a>
            </div>
        @endsection


        @section('modal')
            <!-- Modal -->
            @foreach ($restaurants as $restaurant)
                <div class="modal fade" id="restaurant-{{ $restaurant->id }}" tabindex="-1"
                    aria-labelledby="restaurant-{{ $restaurant->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Delete
                                    {{ $restaurant->name }}?</h1>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-black">
                                You CANNOT go back.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abort</button>
                                <form action="{{ route('admin.restaurants.destroy', $restaurant) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        @endsection



        @section('css')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
                integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />

            @vite('resources/scss/indexs.scss')
        @endsection
