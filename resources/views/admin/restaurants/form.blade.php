@extends('layouts.app')

@section('content')
    <section>
        <div class="container">

            {{-- bottone ritorno alla index --}}
            <a class="btn btn-primary my-4" href="{{ route('admin.restaurants.index') }}">
                <i class="fa-solid fa-table me-1"></i>
                Torna alla lista
            </a>

            <h1 class="mb-4">{{ empty($restaurant->id) ? 'Aggiungi Ristorante' : 'Modifica dati Ristoranti' }}</h1>

            <form
                action="{{ empty($restaurant->id) ? route('admin.restaurants.store') : route('admin.restaurants.update', $restaurant) }}"
                method="post">
                @if (!empty($restaurant->id))
                    @method('PATCH')
                @endif

                @csrf

                <div class="row">
                    <div class="col">
                        {{-- input nome --}}
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ old('name', $restaurant->name) }}" />

                        {{-- todo: implementare l'errore di inserimento --}}
                        {{-- @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    {{-- input p_iva --}}
                    <div class="col">
                        <label for="p_iva" class="form-label">P.Iva:</label>
                        <input type="number" class="form-control" id="p_iva" name="p_iva" />

                        {{-- todo: implementare l'errore di inserimento --}}
                        {{-- @error('p_iva')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    <div class="my-3 col-12">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" name="address" id="address" />

                        {{-- todo: implementare l'errore di inserimento --}}
                        {{-- @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                    </div>

                    {{-- input tipologia --}}
                    <div class="col">
                        <label for="types">Tipologia:</label>
                        <select name="type_id" id="type_id" class="form-select">
                            <option value="" class="d-none">Seleziona la tipologia</option>
                            {{-- todo: lista opzioni select --}}
                            {{-- 
                            @foreach ($types as $type)
                                <option {{ $type->id == old('type_id', $resturant->type_id) ? 'selected' : '' }}
                                    value="{{ $type->id }}">
                                    {{ $type->label }}
                                </option> --}}

                        </select>

                        {{-- todo errore type_id --}}
                        {{-- <div class="invalid-feedback">{{$message}}</div> --}}
                    </div>

                    {{-- input immagine --}}
                    <div class="col-12 my-3">
                        <label for="image" class="form-label">Immagine Ristorante:</label>
                        <input type="file" id="image" name="image" class="form-control">
                        {{-- todo errore image --}}
                        {{-- <div class="invalid-feedback">{{$message}}</div> --}}
                    </div>

                </div>

            </form>
        </div>
    </section>
@endsection
