@extends('layouts.app')


@section('content')
    <section>
        <div class="container mt-4 mb-4">
            <h1 class="text-center mb-5">I tuoi piatti</h1>



            <div class="row gy-3 gx-3">
                @forelse($dishes as $dish)
                    <div class="col-lg-3 col-md-6 col-sm-12 p-6">
                        <div class="myCard h-100">
                            <!-- IMAGE -->
                            <div class="coverImage dishCover">
                                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
                            </div>
                            <div class="d-flex flex-column justify-content-between flex-grow-1">
                                <!-- DETAILS -->
                                <div class="mb-4 d-flex flex-column justify-content-between flex-grow-1">
                                    <div>
                                        <h3 class="detailCap">{{ $dish->name }}</h3>
                                        <p>{{ $dish->getAbstract() }}</p>
                                    </div>
                                    <h3>€{{ $dish->price }}</h3>
                                </div>
                                <!-- BUTTONS -->
                                <div class="d-flex align-items-center justify-content-between">
                                    <a class="ballButton" href="{{ route('admin.dishes.show', $dish) }}"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a class="ballButton" href="{{ route('admin.dishes.edit', $dish) }}"><i
                                            class="fa-solid fa-pencil"></i></a>
                                    <button type="button" class="deletebutton" data-bs-toggle="modal"
                                        data-bs-target="#dish-{{ $dish->id }}"><span>DELETE</span>
                                        <div class="icon"><i class="fa-solid fa-trash"></i></div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2>No Dishes Found</h2>
                @endforelse


                <div class="col-lg-3 col-md-6 col-sm-12" id="addButton">
                    <a href="{{ route('admin.dishes.create') }}" class="ballButton"><i
                            class="fa-solid fa-plus fa-lg me-2"></i>New Dish</a>
                </div>
                {{ $dishes->links('pagination::bootstrap-5') }}
            </div>
    </section>
@endsection

<!-- Modal -->
@section('modal')
    @foreach ($dishes as $dish)
        <div class="modal fade" id="dish-{{ $dish->id }}" tabindex="-1" aria-labelledby="dish-{{ $dish->id }}"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Delete {{ $dish->name }}?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-black">
                        You CANNOT revert this action
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abort</button>
                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
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
