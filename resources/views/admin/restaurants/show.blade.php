@extends('layouts.app')

@section('title', 'Lista Ristoranti')



@section('content')

<section>
    <div class="container">
        <a href="{{ route('admin.restaurants.index') }}" class="my-4 btn btn-primary">
            <i class="fa-solid fa-circle-left fa-beat"></i>
            Back to the List</a>
        <h1 class="mb-4">{{ $restaurant->name }}</h1>
        <img src="{{asset('storage/' . $restaurant->image)}}" alt="">
        <p>{{ $restaurant->p_iva }}</p>
        <p>{{ $restaurant->address }}</p>

        <a href="{{ route('admin.dishes.index', $restaurant) }}" class="my-4 btn btn-primary">
            <i class="fa-solid fa-bars fa-beat"></i>
            Menu</a>


            <!-- <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($restaurant->dishes as $dish)

                        
                        <tr>
                            <td>{{ $dish->id }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>
                            <a href="{{ route("admin.dishes.show", $dish) }}" class="btn btn-info my-3">
                            <i class="fa-solid fa-book"></i></a>
                            
                             <a href="{{ route("admin.dishes.edit", $dish) }}" class="btn btn-warning my-3"><i class="fa-solid fa-pen-to-square"></i></a>
      
                             <button data-bs-target="#delete-dishes-{{ $dish->id }}-modal"  class="btn btn-danger my-3" type="button" class="btn btn-primary" data-bs-toggle="modal"><i class="fa-solid fa-xmark"></i></button>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table> -->

    </div>
</section>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
