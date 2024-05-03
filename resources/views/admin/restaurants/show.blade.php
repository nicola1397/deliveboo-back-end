@extends('layouts.app')

@section('title', 'Lista Ristoranti')



@section('content')

    <section>
        <div class="container">
            <a href="{{ route('admin.restaurants.index') }}" class="my-4 btn btn-primary">
                <i class="fa-solid fa-circle-left fa-beat"></i>
                Back to the List</a>
            <h1 class="mb-4">{{ $restaurant->name }}</h1>
            <p>{{ $restaurant->image }}</p>
            <p>{{ $restaurant->p_iva }}</p>
            <p>{{ $restaurant->address }}</p>




        </div>
    </section>

@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
