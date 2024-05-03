@extends('layouts.app')

@section('title', empty($dish->id) ? "New Dish" : "Edit Dish")

@section('content')
<section>
    <div class="container py-4">


        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif --}}

    <a href="{{route('admin.dishes.index')}}" class="btn btn-primary my-3"><i class="fa-solid fa-table-list me-2"></i>Back to the List</a>




    <h1 class="my-3">{{empty($dish->id) ? "Add Dish" : "Edit Dish"}}</h1>
    <form enctype="multipart/form-data" action="{{ empty($dish->id) ? route('admin.dishes.store') : route('admin.dishes.update', $dish) }}" method="POST">
        @if(!empty($dish->id))
        @method('PATCH')
        @endif
        @csrf
        <div class="row">

            <div class="col-6">
                <div>
                    <label for="name" class="form-label">Name: </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ empty($dish->id) ? '' : old('name') ?? $dish->name }}" required max="150" />
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mt-2">
                    <label for="price" class="form-label">Price</label>
                    <input type='text' class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{empty($dish->id) ? '' : old('price') ?? $dish->price }}" required>


                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="img mt-3">
                    <label for="image" class="form-label">Image: </label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ empty($dish->id) ? '' : old("image") }}" />
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>


        </div>

        <label for="description" class="form-label">Description: </label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ empty($dish->id) ? '' : old("description") ?? $dish->description }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-success mt-2"><i class="fa-solid fa-floppy-disk me-2"></i>Save</button>
    </form>

    </div>
</section>
@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
