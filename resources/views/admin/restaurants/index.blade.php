@extends('layouts.app')

@section('title', 'Restaurants')


@section('content')
<div class="container mb-4">
    <h1 class="my-4">Restaurant List</h1>

    <a href="#" class="btn btn-primary mb-4"><i class="fa-solid fa-plus fa-lg me-2"></i>New restaurant</a>

    <div class="row g-4">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Owner</th>
                <th>Slug</th>
                <th>Vat Number</th>
                <th>Image</th>
                <th>Address</th>
                <th></th>
            </thead>

            <tbody>
                @forelse($restaurants as $restaurant)
                <tr>
                    <td>{{$restaurant->id}}</td>
                    <td>{{$restaurant->name}}</td>
                    <td>{{$restaurant->user->name . ' ' . $restaurant->user->last_name}}</td>
                    <td>{{$restaurant->slug}}</td>
                    <td>{{$restaurant->p_iva}}</td>
                    <td>{{$restaurant->image}}</td>
                    <td>{{$restaurant->address}}</td>


                    <td>
                        <a href="{{route('admin.restaurants.show', $restaurant)}}"><i class="fa-solid link-primary fa-eye me-2"></i></a>
                        <a href="{{route('admin.restaurants.edit', $restaurant)}}"><i class="fa-solid link-primary fa-pencil me-2"></i></a>
                        <button type="button" class="btn btn-link text-danger p-0 pb-1" data-bs-toggle="modal" data-bs-target="#project-{{$restaurant->id}}">
                            <i class="fa-solid fa-trash"></i>
                        </button>


                    </td>
                </tr>

                @empty
                <h2>No Restaurant Found</h2>
                @endforelse
            </tbody>


        </table>
    </div>
    {{-- {{$restaurant->links()}} --}}
</div>

@endsection


@section('modal')
<!-- Modal -->
@foreach($restaurants as $restaurant)

<div class="modal fade" id="restaurant-{{$restaurant->id}}" tabindex="-1" aria-labelledby="restaurant-{{$restaurant->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminare {{$restaurant->title}}?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You CANNOT go back.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abort</button>
                <form action="{{route('admin.restaurants.destroy', $restaurant)}}" method="POST">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
