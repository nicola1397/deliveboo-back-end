@extends('layouts.app')

@section('content')
<section>
    <div class="container mb-4">
        <h1>Dishes List</h1>

        <a href="#" class="btn btn-primary mb-4"><i class="fa-solid fa-plus fa-lg me-2"></i>New Dish</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Dish Name</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dishes as $dish)
                <tr>
                    <td>{{ $dish['name'] }}</td>
                    <td>{{ $dish->getAbstract(25) }}</td>
                    <td>{{ $dish['slug'] }}</td>
                    <td>{{ $dish['price'] }}€</td>
                    <td>
                        <a href="{{route('admin.dishes.show', $dish)}}"><i class="fa-solid link-primary fa-eye me-2"></i></a>
                        <a href="{{route('admin.dishes.edit', $dish)}}"><i class="fa-solid link-primary fa-pencil me-2"></i></a>
                        <button type="button" class="btn btn-link text-danger p-0 pb-1" data-bs-toggle="modal" data-bs-target="#project-{{$dish->id}}">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="100%">
                        <i>Dish not found</i>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $dishes->links('pagination::bootstrap-5') }}
    </div>
</section>
@endsection


@section('modal')
<!-- Modal -->
@foreach($dishes as $dish)

<div class="modal fade" id="dish-{{$dish->id}}" tabindex="-1" aria-labelledby="dish-{{$dish->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete {{$dish->name}}?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                You CANNOT revert this action
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abort</button>
                <form action="{{route('admin.dishes.destroy', $dish)}}" method="POST">
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
