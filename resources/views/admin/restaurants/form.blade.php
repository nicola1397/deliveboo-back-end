@extends('layouts.app')

@section('content')
    <section>

        <div class="container">

            {{-- bottone ritorno alla index --}}
            <a class="btn btn-primary my-4" href="{{ route('admin.restaurants.index') }}">
                <i class="fa-solid fa-table-list"></i>
                Torna alla lista
            </a>

            <h1 class="mb-4">{{ empty($restaurant->id) ? 'Aggiungi Ristorante' : 'Modifica dati Ristoranti' }}
            </h1>

            <form
                action="{{ empty($restaurant->id) ? route('admin.restaurants.store') : route('admin.restaurants.update', $restaurant) }}"
                method="post">
                @if (!empty($restaurant->id))
                    @method('PATCH')
                @endif

                @csrf

                <div class="row">
                    <div class="col-sm-12 col-md-6 card p-3">
                        <div>

                            {{-- input nome --}}
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ empty($restaurant->id) ? '' : old('name') ?? $restaurant->name }}" required />

                            {{-- todo: implementare l'errore di inserimento --}}
                            {{-- @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                @enderror --}}
                        </div>


                        <div class="mt-3">

                            {{-- input p_iva --}}
                            <label for="p_iva" class="form-label">P.Iva:</label>
                            <input type="number" class="form-control" id="p_iva" name="p_iva" required />

                            {{-- todo: implementare l'errore di inserimento --}}
                            {{-- @error('p_iva')
                            <div class="invalid-feedback">{{ $message }}</div>
            @enderror --}}
                        </div>

                        <div class="mt-3">
                            {{-- input nome --}}
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ empty($restaurant->id) ? '' : old('phone') ?? $restaurant->phone }}" required />

                            {{-- todo: implementare l'errore di inserimento --}}
                            {{-- @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
        @enderror --}}

                        </div>



                        <div class="mt-3">

                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" name="address" id="address" required />

                            {{-- todo: implementare l'errore di inserimento --}}
                            {{-- @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}

                        </div>

                        {{-- input tipologia --}}
                        <div class="mt-3">
                            <label for="types">Types:</label>

                            <div class="d-flex flex-wrap @error('types') is-invalid @enderror">
                                @foreach ($types as $type)
                                    <div class="col-4 mb-1">
                                        <input class="form-check-input @error('types') is-invalid @enderror" type="checkbox"
                                            value="{{ $type->id }}" id="type-{{ $type->id }}" name="types[]">
                                        <label class="form-check-label"
                                            for=" type-{{ $type->id }}">{{ $type->label }}</label>
                                    </div>
                                @endforeach
                                {{-- todo: errore type_id --}}
                                {{-- <div class="invalid-feedback">{{$message}}  </div> --}}
                            </div>
                        </div>







                        <div class="mt-3">
                            {{-- input immagine --}}
                            <label for="image" class="form-label" required>Image:</label>
                            <input type="file" id="image" name="image" class="form-control">
                            {{-- todo: errore image --}}
                            {{-- <div class="invalid-feedback">{{$message}}</div> --}}
                        </div>

                        {{-- todo: cancellazione immagine --}}


                        <div class="mt-3">
                            {{-- bottone invio --}}
                            <button class="btn btn-success ">
                                <i class="fa-solid fa-floppy-disk"></i>Save</button>
                            {{-- todo: salvataggio/modifica --}}
                            {{-- {{ empty($restaurant->id ? 'Salva' : 'Modifica') }} --}}

                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6 ps-5">
                        <img src="{{ asset('assets/') . '/rest.svg' }}" alt="">

                    </div>
                </div>

        </div>

        </form>
        </div>
    </section>
@endsection
