@extends('layouts.app')

@section('title', 'Lista Ristoranti')



@section('content')

<section>
    <div class="container">
        <a href="{{ route('admin.restaurants.index') }}" class="my-4 btn btn-primary">
            <i class="fa-solid fa-circle-left fa-beat"></i>
            Back to the List</a>
            <div class="row">
                <div class="col-md-6">
        
        <div class="coverImage">
        <img src="{{ asset('storage/' . $restaurant->image)}}" alt="{{$restaurant->name}}">
        </div>
      
</div>

<div class="col-md-6">
        <h5>Nome Ristorante</h5>
        <h1 class="mb-4" class="detailCap">{{ $restaurant->name }}</h1>
        <h5>Proprietario</h5>
        <p class="detailCap">{{ $restaurant->user->name }} {{ $restaurant->user->last_name }}</p>
        <h5>Partita Iva</h5>
        <p class="detailCap">{{ $restaurant->p_iva }}</p>
        <h5>Indirizzo</h5>
        <p class="detailCap">{{ $restaurant->address }}</p>
        <h5>Tipologia Ristorante</h5>
        @foreach($restaurant->types as $type)
        <p class="detailCap">{{ $type->label }}</p>
        @endforeach
        

        <a href="{{ route('admin.dishes.index', $restaurant) }}" class="my-4 btn btn-primary">
            <i class="fa-solid fa-bars fa-beat"></i>
            Menu</a>
          </div>
      </div>


    </div>
</section>

@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
