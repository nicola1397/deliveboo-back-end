@extends('layouts.app')

{{-- ! Page name --}}
@section('title', empty($dish->id) ? 'New Dish' : 'Edit Dish')

{{-- !! Main-Content --}}
@section('content')
    <section>
        <div class="container py-4">

            {{-- //TEST ERROR MESSAGE --}}
            {{-- //@if ($errors->any())
                //<div class="alert alert-danger">
                //    <ul>
                //        @foreach ($errors->all() as $error)
                //        <li>{{ $error }}</li>
                //@endforeach
                //</ul>
                //</div>
                //@endif --}}

            {{-- * LinkButton back to dishes list --}}
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary mt-3">
                <i class="fa-solid fa-table-list me-2"></i>Back to the Dish List</a>

            {{-- * Main title page --}}
            <h1 class="my-3">{{ empty($dish->id) ? 'Add Dish' : 'Edit Dish' }}</h1>

            {{-- * CREATE/EDIT FORM --}}
            <form enctype="multipart/form-data" 
                {{-- Distinguish if the user needs to create or to edit --}}
                action="{{ empty($dish->id) ? route('admin.dishes.store') : route('admin.dishes.update', $dish) }}"
                method="POST">
                @if (!empty($dish->id))
                    @method('PATCH')
                @endif
                @csrf


                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        {{-- * Creation/edit card --}}
                        <div class="card p-2">

                            {{-- Input dish-name --}}
                            <div>
                                <label for="name" class="form-label"><strong>* </strong>Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" type="text" max="150" required
                                    value="{{ empty($dish->id) ? '' : old('name') ?? $dish->name }}" />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Input dish-price --}}
                            <div class="mt-2">
                                <label for="price" class="form-label"><strong>* </strong>Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" id="price"
                                    name="price" type='number' pattern="^\d{4}*(\.\d{0,2})?$" required min="0.01" max="9999.99"
                                    value="{{ empty($dish->id) ? '' : old('price') ?? $dish->price }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Input dish-availability --}}
                            <div class="mt-2">
                                <label for="availability" class="form-check-label">Available</label>
                                <input type="hidden" name="availability" value="0">
                                <input class="form-check-input form-control" id="availability" name="availability"
                                    type="checkbox" value="1" {{ $dish->availability ? 'checked' : '' }}>
                            </div>

                            {{-- Input dish-image --}}
                            <div class="img mt-3">
                                <label for="image" class="form-label">Image</label>
                                <div class="d-flex">
                                    <input class="form-control @error('image') is-invalid @enderror" id="image"
                                        name="image" type="file" value="{{ empty($dish->id) ? '' : old('image') }}" />
                                    @if (!empty($dish->id))
                                        <div class="delete-dish-image btn btn-danger rounded">X</div>
                                    @endif
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Input dish-description --}}
                            <div class="mt-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="4">{{ empty($dish->id) ? '' : old('description') ?? $dish->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Form submit-button --}}
                            <button type="submit" class="btn btn-success mt-5"><i
                                    class="fa-solid fa-floppy-disk me-2"></i>Save</button>
                            
                            <p class="mt-3"><strong>* </strong>I campi contrassegnati sono obbligatori</p>

                        </div>
                    </div>

                    {{-- Right layout img --}}
                    <div class="col-sm-12 col-md-6 p-5">
                        <img src="{{ asset('assets/') . '/dishform.svg' }}" alt="">
                    </div>
                </div>
            </form>


            {{-- IMAGE DELETION FORM --}}
            @if (!empty($dish->id))
                <form action="{{ route('admin.dish.destroyImage', $dish) }}" class="d-none" method="POST"
                    id="delete-image-form">
                    @csrf
                    @method('DELETE')
                </form>
            @endif
        </div>
    </section>
@endsection


@section('js')
    <script>
        // IMAGE DELETION
        const deleteImageButton = document.querySelector('.delete-dish-image');
        const deleteImageForm = document.querySelector('#delete-image-form');

        deleteImageButton.addEventListener('click', () => {
            deleteImageForm.submit();
        })
    </script>
@endsection

{{-- ! CSS --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection