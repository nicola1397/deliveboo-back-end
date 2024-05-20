@extends('layouts.app')

{{-- ! Page name --}}
@section('title', empty($restaurant->id) ? 'New Restaurant' : 'Edit Restaurant')

{{-- !! Main-Content --}}
@section('content')
    <section>
        <div class="container">

            @if (session('error'))
                <div class="alert alert-danger mt-5">
                    {{ session('error') }}
                </div>
            @endif

            {{-- * LinkButton back to restaurants list --}}
            <a class="btn btn-primary my-4" href="{{ route('admin.restaurants.index') }}">
                <i class="fa-solid fa-table-list"></i>
                Torna alla lista
            </a>

            {{-- * Main title page --}}
            <h1 class="mb-4">Aggiungi Ristorante</h1>

            {{-- * CREATE/EDIT FORM --}}
            <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data" id="checkGroup">
                @csrf

                <div class="row mb-5">
                    {{-- * Creation card --}}
                    <div class="col-sm-12 col-md-6 card p-3">

                        {{-- Input restaurant-name --}}
                        <div>
                            <label for="name" class="form-label"><strong>* </strong>Nome:</label>
                            <input class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                type="text" required max='200' value="{{ old('name') ?? '' }}" />
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input p_iva --}}
                        <div class="mt-2">
                            <label for="p_iva" class="form-label"><strong>* </strong>P.Iva:</label>
                            <input class="form-control @error('p_iva') is-invalid @enderror" name="p_iva" id="p_iva"
                                type="text" required pattern='\d{11}' title='11 cifre numeriche' />
                            @error('p_iva')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input phone number --}}
                        <div class="mt-2">
                            <label for="phone" class="form-label"><strong>* </strong>Telefono:</label>
                            <input class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                                type="text" required max='20' value="{{ old('phone') ?? '' }}" />
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input restaurant address --}}
                        <div class="mt-2">
                            <label for="address" class="form-label"><strong>* </strong>Indirizzo:</label>
                            <input class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                                type="text" required max='150' />
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input restaurant type --}}
                        <div class="mt-2">
                            <label for="types" class="mb-2"><strong>* </strong>Tipologie:</label>
                            <div class="d-flex flex-wrap @error('types') is-invalid @enderror">
                                @foreach ($types as $type)
                                    <div class="col-4 mb-1 form-group checkboxes">
                                        <input class="form-check-input required_group @error('types') is-invalid @enderror"
                                            name="types[]" id="type-{{ $type->id }}" type="checkbox"
                                            value="{{ $type->id }}">
                                        <label class="form-check-label checkbox"
                                            for=" type-{{ $type->id }}">{{ $type->label }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('types')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input restaurant immagine --}}
                        <div class="mt-2">
                            <label for="image" class="form-label">Immagine:</label>
                            <input type="file" id="image" name="image" class="form-control" max='250'>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Form submit-button --}}
                        <button type="submit" name="submit" class="btn btn-success mt-3 " id="check"><i
                                class="fa-solid fa-floppy-disk me-2"></i>Salva
                        </button>
                        <p class="mt-3"><strong>* </strong>I campi contrassegnati sono obbligatori</p>

                    </div>

                    {{-- Right layout img --}}
                    <div class="col-sm-12 col-md-6 ps-5">
                        <img src="{{ asset('assets/') . '/rest.svg' }}" alt="">
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function validateGrp() {
            let things = document.querySelectorAll('.required_group')
            let checked = 0;
            for (let thing of things) {
                thing.checked && checked++
            }
            if (checked) {
                things[things.length - 1].setCustomValidity("");
                document.getElementById('checkGroup').submit();
            } else {
                things[things.length - 1].setCustomValidity("You must check at least one checkbox");
                things[things.length - 1].reportValidity();
            }
        }

        document.querySelector('[name=submit]').addEventListener('click', () => {
            validateGrp()
        });
    </script>
@endsection

{{-- ! CSS --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
